<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\PreferenceRepository;
use App\Models\Event;
use App\Models\Timeline;
use App\Models\EventBlock;

class OrderController extends Controller
{   
    protected $orderRepo;
    protected $preferenceRepo;

    public function __construct(OrderRepository $orderRepo, PreferenceRepository $preferenceRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->preferenceRepo = $preferenceRepo;
    }

    public function index()
    {
        $ordersArray = $this->orderRepo->all(); 
        $columns = $this->preferenceRepo->getOrdersTablePreferences();
        return view('order.index', compact('ordersArray', 'columns'));
    }
    
    public function show($orderId)
    {
        $order = $this->orderRepo->get($orderId);        
        $timeLine = Timeline::get()->where('publish',1)->first(); 

        return view('order.show', compact('order','timeLine','orderId'));

    }

    public function block_order(Event $event){
        //return $event;
        $titulo = $event->active_version->title_block;
        $subtitulo = $event->active_version->subtitle_block;
        $imagen = $event->active_version->bg_block_image;
        $events = $event->active_version->text_blocks;
        //$t = json_encode($r);
        //return ($events);
        foreach ($events as $ev) {
            //$r[] = str_replace('\\','',$ev->audience);
            $block_c[] = str_replace('\\','',$ev->block_content);            
            $audience[]= json_decode(str_replace('\\','',$ev->audience), true);          
        }
        //dd($t[1]['buyer']['checked']);
        //dd($t[0]['buyer']['checked']);
        //dd($audience);
         /* foreach($audience as $aud_ce){
            if($aud_ce['buyer']['checked']){
                $result = $aud_ce['buyer']['desc'];
            }else if($aud_ce['listing_agent']['checked']){
                $result = $aud_ce['listing_agent']['desc'];
            }else if($aud_ce['lender']['checked']){
                $result = $aud_ce['lender']['desc'];
            }else if($aud_ce['seller']['checked']){
                $result = $aud_ce['seller']['desc'];
            }else if($aud_ce['buying_agent']['checked']){
                $result = $aud_ce['buying_agent']['desc'];
            }else if($aud_ce['settlement_agent']['checked']){
                $result = $aud_ce['settlement_agent']['desc'];
            }else if($aud_ce['title_company']['checked']){
                $result = $aud_ce['title_company']['desc'];
            }
         }
         dd($result); */
        //dd($t[0]['buyer']);
        //$url = substr($imagen,21, 39);
        //$text = preg_replace("",'',$i);
        //$s = json_decode($i,true); 
        return view('order.sendmail', compact('event','audience'));

    }

    
}