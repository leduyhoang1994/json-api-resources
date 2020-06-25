<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function makeFormula($data, $item)
{
    return $data.'["' . $item['field'] . '"] ' . $item['equation'] . ' ' . $item['value'];
}
Route::get('/leads/export', '\App\Http\Controllers\Api\V1\LeadController@export');

function getLogic($formula, $rules, $data, $boundary = false)
{
    if ($boundary) {
        $formula .= "(";
    }
    for ($i = 0; $i < count($rules); $i++) {
        $rule = $rules[$i];
        if ($i != 0) {
            $formula .= (' ' . $rule["logic"] . ' ');
        }
        if ($rule['equation'] === 'formula') {
            $formula .= getLogic('', $rule['childrens'], $data, true);
        } else {
            $formula .= makeFormula($data, $rule);
        }
    }
    if ($boundary) {
        $formula .= ")";
    }

    return $formula;
}

//Route::get('/', function () {
//    $a = 1;
//    $b = 2;
//    $c = null;
//    $formula = "";
//
//    $data = [
//        'a' => 1,
//        'b' => 2
//    ];
//
//    $rules = [
//        [
//            'field' => 'a',
//            'equation' => '>',
//            'value' => 4,
//            'logic' => '&&'
//        ],
//        [
//            'field' => 'b',
//            'equation' => '>',
//            'value' => 4,
//            'logic' => '&&'
//        ],
//        [
//            'field' => null,
//            'equation' => 'formula',
//            'value' => null,
//            'logic' => '&&',
//            'childrens' => [
//                [
//                    'field' => 'a',
//                    'equation' => '>',
//                    'value' => 8,
//                    'logic' => '&&'
//                ],
//                [
//                    'field' => 'b',
//                    'equation' => '>',
//                    'value' => 8,
//                    'logic' => '&&'
//                ],
//                [
//                    'field' => null,
//                    'equation' => 'formula',
//                    'value' => null,
//                    'logic' => '&&',
//                    'childrens' => [
//                        [
//                            'field' => 'a',
//                            'equation' => '>',
//                            'value' => 9,
//                            'logic' => '&&'
//                        ],
//                        [
//                            'field' => 'b',
//                            'equation' => '>',
//                            'value' => 9,
//                            'logic' => '&&'
//                        ],
//                    ]
//                ]
//            ]
//        ],
//    ];
//
//    $formula = getLogic($formula, $rules, '$data');
//    var_dump($formula);
//    eval("\$c = $formula;");
//    var_dump($c);
//    return $c;
//});
