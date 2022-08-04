<?php

namespace App\Http\Livewire\Communication\Timeline;

use App\Models\Event;
use App\Models\EventBlock;
use App\Models\Timeline;
use App\Models\TimelineVersion;
use App\Models\EventVersionsTimelineVersion;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimelineEdit extends Component
{
    public $timeline;
    public $timeline_id;
    public $event_versions_timeline_versions;
    public $sort_ids;
    public $event_selected_id = null;
    public $sms_block = null;
    public $listeners = ['updateSort' => 'updateSort'];

    private const SMS_BLOCK = 10;

    public function render()
    {
        $this->timeline = Timeline::find($this->timeline_id);
        $this->event_versions_timeline_versions = $this->timeline->last_version->event_versions_timeline_versions;
        return view('livewire.communication.timeline.timeline-edit');
    }

    public function updateSort($items)
    {
        foreach ($items as $item) {
            $event_versions_timeline_version = EventVersionsTimelineVersion::find($item['value']);
            $event_versions_timeline_version->order = $item['order'];
            $event_versions_timeline_version->update();
        }
        session()->flash('success', 'The order was saved successfully');
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            $this->timeline->update([
                'user_id_modified' => auth()->user()->id
            ]);

            $new_version = intval($this->timeline->last_version->name) + 1;

            $timeline_version = TimelineVersion::create([
                'timeline_id' => $this->timeline->id, 
                'name' => $new_version, 
                'user_id_created' => auth()->user()->id, 
            ]);
            $this->timeline->update(['timeline_version_id' => $timeline_version->id]);

            if ($this->sort_ids){
                $array_event_versions = array();
                foreach ($this->sort_ids as $sort => $id){
                    $array_event_versions[$id] = [
                        'enabled' => true,
                        'order' => ($sort + 1),
                        'created_at' => Carbon::now(),
                    ];
                }
                $timeline_version->event_versions()->attach($array_event_versions);
            }
            DB::commit();

            session()->flash('success', 'Timeline successfully updated.');
        } catch (\Throwable $th) {
            DB::rollBack();

            session()->flash('error', 'Timeline successfully updated.');
        }
    }

    public function delete($event_versions_timeline_version_id) 
    {
        $event_versions_timeline_version = EventVersionsTimelineVersion::find($event_versions_timeline_version_id);
        $event_versions_timeline_version->enabled = false;
        $event_versions_timeline_version->update();
        
        session()->flash('success', 'Event was successfully deleted.');
    }

    public function unpublish($event_versions_timeline_version_id) 
    {
        $event_versions_timeline_version = EventVersionsTimelineVersion::find($event_versions_timeline_version_id);
        $event_versions_timeline_version->publish = false;
        $event_versions_timeline_version->update();
        
        session()->flash('success', 'Event was successfully unpublished.');
    }

    public function publish($event_versions_timeline_version_id) 
    {
        $event_versions_timeline_version = EventVersionsTimelineVersion::find($event_versions_timeline_version_id);
        $event_versions_timeline_version->publish = true;
        $event_versions_timeline_version->update();
        
        session()->flash('success', 'Event was successfully published.');
    }

    public function addSMS($id) {
        $event = Event::find($id);
        $event->sms = true;
        $event->update();
        
        session()->flash('success', 'SMS was added successfully.');
    }

    public function removeSMS($id) {
        $event = Event::find($id);
        $event->sms = false;
        $event->update();
        
        session()->flash('success', 'SMS was removed successfully.');
    }
    
    public function showSMSModal($id) 
    {
        $this->event_selected_id = $id;
        
        $event = Event::find($id);
        $eventBlock = EventBlock::where([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::SMS_BLOCK,
        ])->first();
        if ($eventBlock) {
            $this->sms_block = $eventBlock->block_content;
        } else {
            $this->sms_block = '';
        }
        $this->emit('showModal');
    }

    public function setSMS($id, $sms_text)
    {
        $event = Event::find($id);
        $eventBlock = EventBlock::where([
            'event_version_id' => $event->active_version->id,
            'block_type' => self::SMS_BLOCK,
        ])->first();
        if ($eventBlock) {
            $eventBlock->block_content = $sms_text;
            $eventBlock->update();
        } else {
            EventBlock::create([
                'event_version_id' => $event->active_version->id,
                'block_type' => self::SMS_BLOCK,
                'block_title' => 'SMS',
                'block_content' => $sms_text,
                'user_id_created' => auth()->user()->id
            ]);
        }

        session()->flash('success', 'The SMS was successfully set.');
        $this->emit('hideModal');
    }
}
