<?php

namespace App\Http\Controllers;

use App\User;
use App\Src\Models\Status;
use App\Src\Meli\MeliUsers;
use App\Src\Models\WebHook;
use App\Src\Meli\MeliOrders;
use App\Src\Models\Customer;
use App\Src\Tools\StdClassTool;
use App\Src\Models\PedidoCliente;
use App\Src\Meli\MeliNotifications;
use App\Src\Models\WebHookMessages;
use App\Src\Models\WebHookQuestion;
use App\Src\Models\WebHookResponse;
use App\Src\Traits\DateFormatTrait;
use Illuminate\Support\Facades\Log;
use App\Events\WebHookOrderWasReceived;
use Illuminate\Support\Facades\Response;
use App\Events\WebHookMessageWasReceived;
use App\Events\WebHookQuestionWasReceived;
use App\Transformers\Meli\WebHookMessageTransformer;
use App\Transformers\PedidoCliente\PedidoClienteListTransformer;

class MeliNotificationsController extends Controller
{
    use DateFormatTrait;
    
    protected $notifications;

    protected $meli_user;

    protected $meli_orders;

    public function __construct()
    {
        $this->notifications = new MeliNotifications;

        $this->meli_user = new MeliUsers;

        $this->meli_orders = new MeliOrders;
    }

    public function save_response($response, $wh)
    {
        $whR = new WebHookResponse;
        $whR->web_hook_id = $wh->id;
        $whR->response = StdClassTool::toArray($response);
        $whR->status_id = Status::NOTIFICACION_EN_PROCESO;       
        $whR->save();
    }

    public function web_hooks()
    {
        $user = User::find(1);
        /* Log::info('### Antes de  verify_expiration_time_token ###');
            Log::info($meli_data);
            Log::info('############'); */
        if($user->verify_expiration_time_token())
        {

            $meli_data = $this->meli_user->refresh_token($user->company->mercadoLibre->meli_refresh_token); 
            
            /* Log::info('### TOKEN ACTUALIZADO ###');
            Log::info($meli_data);
            Log::info('############'); */
            
            $user->updateDataWithRefreshToken($meli_data);

        }
        //http_response_code(200);
        $data = request()->all();

        usleep( 200 * 1000 );

        Log::alert("htttttptptptptptp");
        Log::alert(file_get_contents('php://input'));
        Log::alert("htttttptptptptptp");
        //http_response_code(200);
        header("HTTP/1.1 200 OK");

        usleep( 200 * 1000 );
        
        $wh = new WebHook;
        $wh->meli_info = $data;
        $wh->save();
        $wh->refresh();
        
        //$wh->_id = $wh->meli_info['_id'];
        $wh->application_id = $wh->meli_info['application_id'];
        $wh->user_id = $wh->meli_info['user_id'];
        $wh->resource = $wh->meli_info['resource'];
        $wh->topic = $wh->meli_info['topic'];
        $wh->sent = $wh->meli_info['sent'];
        $wh->received = $wh->meli_info['received'];
        $wh->attempts = $wh->meli_info['attempts'];
        //$wh->created = $wh->meli_info['created_at'];
        $wh->status_id = Status::ACTIVO;
        $wh->save();
        $wh->refresh();

        if ($wh->topic == 'messages') {

            $response = $this->notifications->notification_resource($user->company->mercadoLibre->meli_token, $wh->meli_info['topic'] . '/' .$wh->meli_info['resource']);

            $response = StdClassTool::toArray($response);

            $message = new WebHookMessages;
            $message->message_id = (array_key_exists('message_id', $response['body'])) ? $response['body']['message_id'] : null; 
            $message->send_user_id = (array_key_exists('send_user_id', $response['body'])) ? $response['body']['send_user_id'] : null; 
            $message->send_user_email = (array_key_exists('send_user_email', $response['body'])) ? $response['body']['send_user_email'] : null; 
            $message->receive_user_id = (array_key_exists('receive_user_id', $response['body'])) ? $response['body']['receive_user_id'] : null; 
            $message->receive_user_email = (array_key_exists('receive_user_email', $response['body'])) ? $response['body']['receive_user_email'] : null; 
            $message->text = (array_key_exists('text', $response['body'])) ? is_array($response['body']['text'])? json_encode($response['body']['text']) : $response['body']['text'] : null;
            $message->plain = (array_key_exists('plain', $response['body'])) ? $response['body']['plain'] : null; 
            $message->status = (array_key_exists('status', $response['body'])) ? $response['body']['status'] : null; 
            $message->site_id = (array_key_exists('site_id', $response['body'])) ? $response['body']['site_id'] : null; 
            $message->date = (array_key_exists('date', $response['body'])) ? $response['body']['date'] : null; 
            $message->date_created = (array_key_exists('date_created', $response['body'])) ? $response['body']['date_created'] : null; 
            $message->date_received = (array_key_exists('date_received', $response['body'])) ? $response['body']['date_received'] : null; 
            $message->date_available = (array_key_exists('date_available', $response['body'])) ? $response['body']['date_available'] : null; 
            $message->date_notified = (array_key_exists('date_notified', $response['body'])) ? $response['body']['date_notified'] : null; 
            $message->date_read = (array_key_exists('date_read', $response['body'])) ? $response['body']['date_read'] : null; 
            $message->from = (array_key_exists('from', $response['body'])) ? is_array($response['body']['from'])? json_encode($response['body']['from']) : $response['body']['from'] : null;
            $message->to = (array_key_exists('to', $response['body'])) ? is_array($response['body']['to'])? json_encode($response['body']['to']) : $response['body']['to'] : null;
            $message->moderation = (array_key_exists('moderation', $response['body'])) ? is_array($response['body']['moderation'])? json_encode($response['body']['moderation']) : $response['body']['moderation'] : null;
            $message->hold = (array_key_exists('hold', $response['body'])) ? $response['body']['hold'] : null; 
            $message->answer = (array_key_exists('answer', $response['body'])) ? $response['body']['answer'] : null; 
            $message->name = (array_key_exists('name', $response['body'])) ? $response['body']['name'] : null; 
            $message->subject = (array_key_exists('subject', $response['body'])) ? $response['body']['subject'] : null; 
            $message->resource = (array_key_exists('resource', $response['body'])) ? $response['body']['resource'] : null; 
            $message->resource_id = (array_key_exists('resource_id', $response['body'])) ? $response['body']['resource_id'] : null; 
            $message->client_id = (array_key_exists('client_id', $response['body'])) ? $response['body']['client_id'] : null; 
            $message->status_id = Status::NOTIFICACION_EN_PROCESO;
            $message->save();
            
            $msg =  fractal($message, new WebHookMessageTransformer())->toArray()['data'];

            broadcast(new WebHookMessageWasReceived($msg));

            $this->save_response($response, $wh);

            //return Response::make('ok', 200);
        }
        
        if ($wh->topic == 'questions') {

            $response = $this->notifications->notification_resource($user->company->mercadoLibre->meli_token, $wh->resource);
                
            $response = StdClassTool::toArray($response);
            
            $question = new WebHookQuestion;
            $question->meli_id = (array_key_exists('meli_id', $response['body'])) ? $response['body']['meli_id'] : null;
            $question->seller_id = (array_key_exists('seller_id', $response['body'])) ? $response['body']['seller_id'] : null;
            $question->text = (array_key_exists('text', $response['body'])) ? is_array($response['body']['text'])? json_encode($response['body']['text']) : $response['body']['text'] : null;
            $question->status = (array_key_exists('status', $response['body'])) ? $response['body']['status'] : null;
            $question->item_id = (array_key_exists('item_id', $response['body'])) ? $response['body']['item_id'] : null;
            $question->date_created = (array_key_exists('date_created', $response['body'])) ? $response['body']['date_created'] : null;
            $question->hold = (array_key_exists('hold', $response['body'])) ? $response['body']['hold'] : null;
            $question->deleted_from_listing = (array_key_exists('deleted_from_listing', $response['body'])) ? $response['body']['deleted_from_listing'] : null;
            $question->answer = (array_key_exists('answer', $response['body'])) ? $response['body']['answer'] : null;
            $question->from = (array_key_exists('from', $response['body'])) ? is_array($response['body']['from'])? json_encode($response['body']['from']) : $response['body']['from'] : null;
            $question->email = (array_key_exists('email', $response['body'])) ? $response['body']['email'] : null;
            $question->save();

            broadcast(new WebHookQuestionWasReceived($question));

            $this->save_response($response, $wh);

            //return Response::make('ok', 200);
        }

        if ($wh->topic == 'orders_v2' || $wh->topic == 'orders') {

            $response = $this->notifications->notification_resource($user->company->mercadoLibre->meli_token, $wh->resource);
            Log::info('#########################################');
            Log::info('############ NUEVA ORDEN ################');
            Log::info('#########################################');
            Log::info($response);
            Log::info('#########################################');
            Log::info('#########################################');
            Log::info('#########################################');
            $ord = StdClassTool::toArray($response['body']);

            $wh_prueba = new WebHook;
            $wh_prueba->meli_info = $ord;
            $wh_prueba->save();
            $wh_prueba->refresh();

            $customer_id = null;

            $cstmr = Customer::where('meli_id', $ord['buyer']['id'])->get();

            if ($cstmr->isEmpty()) {

                //$buyer_data = $this->meli_orders->get_billing_info($user->company->mercadoLibre->meli_token, $ord['id']);

                /* Log::debug('$buyer_data');
                Log::debug($buyer_data);
                Log::debug('$buyer_data'); */
                
                $phone = (array_key_exists('phone', $ord['buyer'])) ? $ord['buyer']['phone']['area_code'] . ' '. $ord['buyer']['phone']['number'] : 'Sin informar';
                

                $customer = new Customer;
                $customer->name = $ord['buyer']['last_name'] . ' ' . $ord['buyer']['first_name'];
                $customer->meli_nick = $ord['buyer']['nickname'];
                $customer->meli_id = $ord['buyer']['id'];
                $customer->email = $ord['buyer']['email'];
                $customer->number = $ord['buyer']['billing_info']['doc_number'];
                $customer->phone_1 = $phone;
                
                $customer->save();

                $customer_id = $customer->id;


                
            }else{

                $customer_id = $cstmr->first()->id;
            }

            sleep(1);

            $or = PedidoCliente::where('meli_id', $ord['id'])->get();

            if ($or->isEmpty()) {

                $pc = new PedidoCliente;
                $pc->customer_id = $customer_id;
                $pc->meli_id = $ord['id'];
                $pc->is_meli_order = true;
                $pc->meli_data = $ord;
                $pc->status_id = Status::PENDIENTE;
                $pc->user_id = 999999; //AUTOMATICO
                $pc->save();
                $pc->code = 'PD-' . $this->createDate($ord['date_created']) . '-' . $pc->customer_id . '-' . $pc->id;
                $pc->number = $pc->id;
                $pc->save();

                $pc->refresh();
                
                $pedido = fractal($pc, new PedidoClienteListTransformer())->toArray()['data'];
                $pedido['now'] = true;
                broadcast(new WebHookOrderWasReceived($pedido));

            }else{
                Log::info('############## LA ORDEN YA EXISTIA ###########################');
                Log::info(gettype($or));
                Log::info($or);
                Log::info('#########################################');
            }

            $this->save_response($response, $wh);
            
            //return Response::make('ok', 200);
        }
        
        return Response::make('ok', 200);
    }
}

