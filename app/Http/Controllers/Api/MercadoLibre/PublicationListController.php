<?php

namespace App\Http\Controllers\Api\MercadoLibre;

use Illuminate\Http\Request;
use App\Src\Models\Publication;
use App\Src\Meli\MeliPublications;
use App\Http\Controllers\Controller;
use App\Transformers\Publications\PublicationListComponentTransformer;

class PublicationListController extends Controller
{
    public function index()
    {
        $p = Publication::paginate(20);

        $ids = $p->getCollection()->map(function($i){
            return $i->meli_id;
        });

        $meli_publications = new MeliPublications;

        $pubs = $meli_publications->get_publications_multiget($ids);
        
        $publications = fractal($pubs['body'], new PublicationListComponentTransformer())->toArray()['data'];

        $response = [
            'pagination' => [
                'total' => $p->total(),
                'per_page' => $p->perPage(),
                'current_page' => $p->currentPage(),
                'last_page' => $p->lastPage(),
                'from' => $p->firstItem(),
                'to' => $p->lastItem()
            ],
            'data' => $publications,
        ];

        return response()->json($response, 200);
    }
}
