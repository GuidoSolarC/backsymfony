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
     * @Route("/prueba/numerosPrimos", name="numerosPrimos")
     */
    public function numerosPrimos(Request $request)  
    {
        if($request->getMethod() == 'POST'){          
            // Contenemos el valor       
            $n = $request->request->get('valor');
            // Declaro un array vacio para ir conteniendo los numeros primos 
            $arrayPrimos = [];

            // https://learnetutorials.com/php/programs/print-n-prime-numbers
            $count = 0;
            $num = 2;
            while ($count < $n) {
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


            return new JsonResponse([
                'msg' => 'Respuesta', 
                'valorRecibido' => $n, 
                'numerosPrimos' => $arrayPrimos
            ], Response::HTTP_OK);

        } else {
            return new JsonResponse([
                'msg' => 'Método incorrecto',
                'valorRecibido' => 0,
                'numerosPrimos' => 0
            ], Response::HTTP_BAD_REQUEST);
        }    
    }


}

?>