<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Repositories\DocumentRepository;
use SendGrid\Mail\Mail;
use App\Models\Event;
use Illuminate\Support\Str;
use App\Http\Repositories\SmsRepository;

class DocumentController extends Controller
{
    /**
     * The  repository instance.
     */
    protected $documentRepo;


    /**
     * Create a new controller instance.
     *
     * @param  \App\Http\Repositories\DocumentRepository  $orders
     * @return void
     */
    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepo = $documentRepo;
    }

    public function index()
    {
        $documentsArray = $this->documentRepo->all();

        return view('document', compact('documentsArray'));
    }

    public function test_mail(Event $event)
    {
        $titulo = $event->active_version->title_block;
        $subtitulo = $event->active_version->subtitle_block;
        $imagen = $event->active_version->bg_block_image;
        $events = $event->active_version->text_blocks;
        //$t = json_encode($r);
        $i = [];
        //return ($imagen);
        foreach ($events as $ev) {
            $r[] = str_replace('\\','',$ev->audience);
            $a[] = $ev->block_content;            
            $t[]= json_decode(str_replace('\\','',$ev->audience), true);          
        }
        //return $a;
        /* dd($t);
         foreach($t as $o){
            if($o['buyer']['checked']){
                $p[] = $o;
            }
         }
        dd($t[0]['buyer']); */
        //$url = substr($imagen,21, 39);
        //$text = preg_replace("",'',$i);
        //$s = json_decode($i,true);        
        

        $email = new Mail();
        $email->setFrom("rbocanegra@ctdevelopers.com", "From Roberto");
        $email->setSubject("Testing Sendgrid");
        $email->addTo("jmanuelus24@gmail.com", "To Roberto");
        $email->addContent(
            "text/html",
            "
            <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' integrity='sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <!-- Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' />
    <!-- Styles -->
    <link rel='stylesheet' href='{{ asset('css/app.css') }}'>
    <link href='{{ asset('css/template/style.bundle.css') }}'' rel='stylesheet' type='text/css' />
    <link href='{{ asset('css/global/plugins.bundle.css') }}' rel='stylesheet' type='text/css' />
    <link rel='stylesheet' href='{{ asset('css/auth/auth-card.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/lockout.css') }}''>
</head>
<body>
<div class='bg-white rounded my-10'>
<div class='d-flex align-items-center flex-column'>
    <div class='pt-10 position-relative'>
        <img src='$imagen' alt='home'>
    </div>
    <div class='py-4 position-relative'>
        <h1 class='display-1'>
            $titulo
        </h1>
    </div>
    <div class='mb-15 position-relative'>
        <h6 class='display-6 fw-light'>
            $subtitulo
        </h6>
    </div>
</div>
<div class='position-relative'>
    <img src='.$imagen.' alt='image-lg' class='img-fluid rounded-bottom'>
</div>
</div>
<div>
$a[0]
</div>
</body>
</html>
            ",
        );
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (\Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    public function test()
    {

        $email = new Mail();
        $email->setFrom("rbocanegra@ctdevelopers.com", "From Roberto");
        $email->setSubject("Testing Sendgrid");
        $email->addTo("rabp_91@hotmail.com", "To Roberto");
        $email->addContent(
            "text/html",
            "<strong>Content is here</strong>"
        );
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (\Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    public function testSms()
    {
        $response =  SmsRepository::send('+13235978553', 'Hi Protracktor');
        dd($response);
    }
}
