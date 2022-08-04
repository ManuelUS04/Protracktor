<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventVersion;
use App\Models\EventBlock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{   
    public function index()
    {
        return view('communication.event.index');
    }

    public function show(Event $event)
    {
        return view('communication.event.show', compact('event'));
    }

    public function create()
    {
        return view('communication.event.create');
    }

    public function store(EventRequest $request)
    {
        DB::beginTransaction();
        try {
            $event = Event::create([
                'user_id_created' => auth()->user()->id,
                'preview' => true,
                'edit' => true,
                'config' => true,
            ] + $request->all());
    
            $eventVersion = EventVersion::create([
                'event_id' => $event->id, 
                'name' => '1', 
                'user_id_created' => auth()->user()->id, 
            ]);
            $event->update(['event_version_id' => $eventVersion->id]);

            DB::commit();

            if (session('link')) {
                return redirect(session('link'))->with('success', 'Event created successfully');
            }
            return redirect()->route('communication.timeline.create')->with('success', 'Event created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The event was not successfully registered');
        }
    }

    public function edit(Event $event)
    {
        return view('communication.event.edit', compact('event'));
    }

    public function update(EventVersion $event_version, Request $request)
    {   
        DB::beginTransaction();
        try {
            foreach ($request->block_id as $index => $block_id) {
                $event_block = EventBlock::find($block_id);
                $event_block->update([
                    'order' => ($index + 1)
                ]);
            }
            DB::commit();
            
            return back()->with('success', 'Event saved successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The event was not saved successfully created');
        }
    }

    public function setBlockBg(EventVersion $event_version, Request $request)
    {
        $bg_block = EventBlock::where([
            'event_version_id' => $event_version->id,
            'block_type' => 1
        ])->first();
        if ($bg_block) {
            if ($request->file('file')) {
                Storage::disk('public')->delete($bg_block->block_content);
                $bg_block->block_content = $request->file('file')->store('backgrounds', 'public');
                $bg_block->update();
            }
        } else {
            $event_block = EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => 1,
                'block_title' => 'Background',
                'block_content' => '',
                'user_id_created' => auth()->user()->id
            ]);
            if ($request->file('file')) {
                $event_block->block_content = $request->file('file')->store('backgrounds', 'public');
                $event_block->save();
            }
        }
        return back()->with('success', 'Background Block set successfully');
    }

    public function setBlockLogo(EventVersion $event_version, Request $request)
    {
        $logo_block = EventBlock::where([
            'event_version_id' => $event_version->id,
            'block_type' => 2
        ])->first();
        if ($logo_block) {
            if ($request->file('file')) {
                Storage::disk('public')->delete($logo_block->block_content);
                $logo_block->block_content = $request->file('file')->store('logos', 'public');
                $logo_block->update();
            }
        } else {
            $event_block = EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => 2,
                'block_title' => 'Logo',
                'block_content' => '',
                'user_id_created' => auth()->user()->id
            ]);
            if ($request->file('file')) {
                $event_block->block_content = $request->file('file')->store('logos', 'public');
                $event_block->save();
            }
        }
        return back()->with('success', 'Logo Block set successfully');
    }

    public function createBlock(EventVersion $event_version, Request $request) 
    {
        DB::beginTransaction();
        try {
            $last = EventBlock::where('event_version_id', $event_version->id)
                ->orderBy('order', 'desc')
                ->first();
            if ($last) {
                $nextOrder = $last->order + 1;
            } else {
                $nextOrder = 1;
            }
            $eventBlock = EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => '3',
                'order' => $nextOrder,
                'user_id_created' => auth()->user()->id
            ] + $request->all());
            DB::commit();
            
            return back()->with('success', 'Block created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The block was not successfully created');
        }
    }

    public function editBlock(EventVersion $event_version, Request $request) 
    {
        $event_block = EventBlock::find($request->block_id);
        $event_block->update($request->all());
        return back()->with('success', 'Block updated successfully');
    }

    public function setBlockSign(EventVersion $event_version, Request $request)
    {
        $sign_block = EventBlock::where([
            'event_version_id' => $event_version->id,
            'block_type' => 4
        ])->first();
        if ($sign_block) {
            $sign_block->update([
                'block_content' => $request->block_content
            ]);
        } else {
            EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => 4,
                'block_content' => $request->block_content,
                'block_title' => 'Sign',
                'user_id_created' => auth()->user()->id
            ]);
        }
        return back()->with('success', 'Sign Block set successfully');
    }

    public function selectVersion(Event $event)
    {
        return view('communication.event.select-version', compact('event'));
    }
}