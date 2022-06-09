<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PruebaController extends AbstractController
{
    /**
     * @Route("/prueba/numerosPrimos", name="numerosPrimos", methods={"GET","HEAD"})
     */
    public function numerosPrimos(Request $request)
    {       
        // Contenemos el valor       
        $valor = is_numeric($request->get('valor')) ? (int)$request->get('valor') : 0;
        if($valor !== 0){
            // Declaro un array vacio para ir conteniendo los numeros primos 
            $arrayPrimos = [];

            // https://learnetutorials.com/php/programs/print-n-prime-numbers
            $count = 0;
            $num = 2;
            while ($count < $valor) {
                $dcount = 0;
                for ($i = 2; $i <= $num; $i++) {
                    if (($num % $i) == 0) {
                        $dcount++;
                    }
                }
                if ($dcount == 1) {
                    array_push($arrayPrimos, $num);
                    $count++;
                }
                $num++;
            }

            return new JsonResponse(array(
                'msg' => 'Respuesta correcta', 
                'valorRecibido' => $valor, 
                'numerosPrimos' => $arrayPrimos
            ), Response::HTTP_OK);
        } else {
            return new JsonResponse(array(
                'msg' => 'El valorg no es un número', 
                'valorRecibido' => $request->get('valor'), 
                'numerosPrimos' => '----'
            ), Response::HTTP_OK);
        }
    }


}

?>