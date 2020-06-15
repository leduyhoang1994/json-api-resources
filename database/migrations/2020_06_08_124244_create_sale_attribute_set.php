<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleAttributeSet extends Migration
{

    protected $saleAttributes = [
        'connection_status' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Connection Status',
                'options' => [
                    'connected' => 'Connected',
                    'busy' => 'Busy, call later',
                    'cant_connect' => 'Cant connect',
                    'cant_connect_3' => 'Cant Connect 3 times',
                    'wrong_target' => 'Wrong target'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L1'
            ]
        ],
        'target_product_id' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Target Product',
                'is_required' => 0,
                'options' => [
                    'fit' => 'Fit',
                    'star' => 'Star',
                    'la' => 'La',
                    'la_online' => 'La Online'
                ],
            ],
            'map' => [
                'attribute_group' => 'L1'
            ]
        ],
        'address' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Address',
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L1'
            ]
        ],
        'concern_status' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Concern Status',
                'options' => [
                    'interested_in' => 'Interested in',
                    'consulted' => 'Consulted',
                    'declined' => 'Declined',
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L2'
            ]
        ],
        'convert_result' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Convert result',
                'options' => [
                    'converted' => 'Converted',
                    'declined' => 'Declined',
                ]
            ],
            'map' => [
                'attribute_group' => 'L3'
            ]
        ],
        'decline_reason' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Decline Reason',
                'options' => [
                    'price' => 'Price',
                    'place' => 'Place',
                    'time' => 'Time',
                    'capability' => 'Capability',
                    'level' => 'Level',
                ]
            ],
            'map' => [
                'attribute_group' => 'L3'
            ]
        ],
        'studio_id' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Studio',
                'is_required' => 1,
                'options' => [
                    "L2901/002A" => "L2901/002A",
                    "L2901/002B" => "L2901/002B",
                    "L2901/003A" => "L2901/003A",
                    "L2901/005A" => "L2901/005A",
                    "L2903/006A" => "L2903/006A",
                    "L2903/006B" => "L2903/006B",
                    "L2903/010A" => "L2903/010A",
                    "L2903/011A" => "L2903/011A",
                    "L2904/012A" => "L2904/012A",
                    "L2904/014A" => "L2904/014A",
                    "L2904/016A" => "L2904/016A",
                    "L2904/017A" => "L2904/017A",
                    "L2905/018A" => "L2905/018A",
                    "L2905/019A" => "L2905/019A",
                    "L2906/020A" => "L2906/020A",
                    "L2906/021B" => "L2906/021B",
                    "L2906/022A" => "L2906/022A",
                    "L2906/023A" => "L2906/023A",
                    "L2906/025A" => "L2906/025A",
                    "L2906/026A" => "L2906/026A",
                    "L2906/026B" => "L2906/026B",
                    "L2907/028A" => "L2907/028A",
                    "L2908/029A" => "L2908/029A",
                    "L2908/030A" => "L2908/030A",
                    "L2912/031A" => "L2912/031A",
                    "F1405/039A" => "F1405/039A",
                    "F1405/039B" => "F1405/039B",
                    "L2906/041A" => "L2906/041A",
                    "L2904/048A" => "L2904/048A",
                    "L2903/049A" => "L2903/049A",
                    "L2912/051A" => "L2912/051A",
                    "L2912/051B" => "L2912/051B",
                    "F1506/052A" => "F1506/052A",
                    "L2904/053A" => "L2904/053A",
                    "F3410/056A" => "F3410/056A",
                    "F1101/057A" => "F1101/057A",
                    "F1405/058A" => "F1405/058A",
                    "L2908/059A" => "L2908/059A",
                    "L2903/060A" => "L2903/060A",
                    "L2901/061A" => "L2901/061A",
                    "L2904/062A" => "L2904/062A",
                    "L2904/063A" => "L2904/063A",
                    "L2904/063B" => "L2904/063B",
                    "L2908/064A" => "L2908/064A"
                ],
            ],
            'map' => [
                'attribute_group' => 'L4'
            ]
        ],
        'course_id' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Course',
                'is_required' => 0,
                'options' => [
                    "CFi01" => "CFi01",
                    "CFi02" => "CFi02",
                    "CFi03" => "CFi03",
                    "CFi04" => "CFi04",
                    "CFi05" => "CFi05",
                    "CFi06" => "CFi06",
                    "CFi07" => "CFi07",
                    "CFi08" => "CFi08",
                    "CFi09" => "CFi09",
                    "CFi10" => "CFi10",
                    "CFi11" => "CFi11",
                    "CFi12" => "CFi12",
                    "CFi13" => "CFi13",
                    "CFi14" => "CFi14",
                    "CFi15" => "CFi15",
                    "CFi16" => "CFi16",
                    "CFi17" => "CFi17",
                    "CFi18" => "CFi18",
                    "CFi19" => "CFi19",
                    "CFi20" => "CFi20",
                    "CFi21" => "CFi21",
                    "CFi22" => "CFi22",
                    "CFi23" => "CFi23",
                    "CFi24" => "CFi24",
                    "CFi25" => "CFi25",
                    "CFi26" => "CFi26",
                    "CFi27" => "CFi27",
                    "CFi28" => "CFi28",
                    "CFi29" => "CFi29",
                    "CFi30" => "CFi30",
                    "CFi31" => "CFi31",
                    "CFi32" => "CFi32",
                    "CFi33" => "CFi33",
                    "CFi34" => "CFi34",
                    "CFi35" => "CFi35",
                    "CFi36" => "CFi36",
                    "CFi37" => "CFi37",
                    "CFi38" => "CFi38",
                    "CFi39" => "CFi39",
                    "CFi40" => "CFi40",
                    "CFi41" => "CFi41",
                    "CFi42" => "CFi42",
                    "CFi43" => "CFi43",
                    "CFi44" => "CFi44",
                    "CFi45" => "CFi45",
                    "CFi46" => "CFi46",
                    "CFi47" => "CFi47",
                    "CFi48" => "CFi48",
                    "CFi49" => "CFi49",
                    "CFi50" => "CFi50",
                    "CFi51" => "CFi51",
                    "CFi52" => "CFi52",
                    "CFi53" => "CFi53",
                    "CFi54" => "CFi54",
                    "CFi55" => "CFi55",
                    "CFi56" => "CFi56",
                    "CFi57" => "CFi57",
                    "CFi58" => "CFi58",
                    "CFi59" => "CFi59",
                    "CFi60" => "CFi60",
                    "CFi61" => "CFi61",
                    "CFi62" => "CFi62",
                    "CFi63" => "CFi63",
                    "CFi64" => "CFi64",
                    "CFi65" => "CFi65",
                    "CFi66" => "CFi66",
                    "CFi67" => "CFi67",
                    "CFi68" => "CFi68",
                    "CFi69" => "CFi69",
                    "CFi70" => "CFi70",
                    "CFi71" => "CFi71",
                    "CFi72" => "CFi72",
                    "CFi73" => "CFi73",
                    "CFi74" => "CFi74",
                    "CFi75" => "CFi75",
                    "CFi76" => "CFi76",
                    "CFi77" => "CFi77",
                    "CFi78" => "CFi78",
                    "CFi79" => "CFi79",
                    "CFi80" => "CFi80",
                    "CFi81" => "CFi81",
                    "CFi82" => "CFi82",
                    "CFi83" => "CFi83",
                    "CFi84" => "CFi84",
                    "CFi85" => "CFi85",
                    "CFi86" => "CFi86",
                    "CFi87" => "CFi87",
                    "CFi88" => "CFi88",
                    "CFi89" => "CFi89",
                    "CFi90" => "CFi90",
                    "CFi91" => "CFi91",
                    "CFi92" => "CFi92",
                    "CFi93" => "CFi93",
                    "CFi94" => "CFi94",
                    "CFi95" => "CFi95",
                    "CFi96" => "CFi96",
                    "CFi97" => "CFi97",
                    "CFi98" => "CFi98",
                    "CFi99" => "CFi99",
                    "CFi100" => "CFi100",
                    "CFi101" => "CFi101",
                    "CFi102" => "CFi102",
                    "CFi103" => "CFi103",
                    "CFi104" => "CFi104",
                    "CFi105" => "CFi105",
                    "CFi106" => "CFi106",
                    "CFi107" => "CFi107",
                    "CFi108" => "CFi108",
                    "CFi109" => "CFi109",
                    "CFi110" => "CFi110",
                    "CFi111" => "CFi111",
                    "CFi112" => "CFi112",
                    "CFi113" => "CFi113",
                    "CFi114" => "CFi114",
                    "CFi115" => "CFi115",
                    "CFi116" => "CFi116",
                    "CFi117" => "CFi117",
                    "CFi118" => "CFi118",
                    "CFi119" => "CFi119",
                    "CFi120" => "CFi120",
                    "CLa01" => "CLa01",
                    "CLa02" => "CLa02",
                    "CLa03" => "CLa03",
                    "CLa04" => "CLa04",
                    "CLa06" => "CLa06",
                    "CLa07" => "CLa07",
                    "CLa08" => "CLa08",
                    "CLa09" => "CLa09",
                    "CLa10" => "CLa10",
                    "CLa11" => "CLa11",
                    "CLa12" => "CLa12",
                    "CLa13" => "CLa13",
                    "CLa14" => "CLa14",
                    "CLa15" => "CLa15",
                    "CLa16" => "CLa16",
                    "CLa17" => "CLa17",
                    "CLa18" => "CLa18",
                    "CLa19" => "CLa19",
                    "CLa20" => "CLa20",
                    "CLa21" => "CLa21",
                    "CLa22" => "CLa22",
                    "CLa23" => "CLa23",
                    "CLa24" => "CLa24",
                    "CLa25" => "CLa25",
                    "CSt01" => "CSt01",
                    "CSt02" => "CSt02",
                    "CSt03" => "CSt03",
                    "CSt04" => "CSt04",
                    "CSt05" => "CSt05",
                    "CSt06" => "CSt06",
                    "CSt07" => "CSt07",
                    "CSt08" => "CSt08",
                    "CSt09" => "CSt09",
                    "CSt10" => "CSt10",
                    "CSt11" => "CSt11",
                    "CSt12" => "CSt12",
                    "CSt13" => "CSt13",
                    "CSt14" => "CSt14",
                    "CSt15" => "CSt15",
                    "CSt16" => "CSt16",
                    "CSt17" => "CSt17",
                    "CSt18" => "CSt18",
                    "CSt19" => "CSt19",
                    "CSt20" => "CSt20",
                    "CSt21" => "CSt21",
                    "CSt22" => "CSt22",
                    "CSt23" => "CSt23",
                    "CSt24" => "CSt24",
                    "CSt27" => "CSt27",
                    "CSt28" => "CSt28",
                    "CSt29" => "CSt29",
                    "CSt30" => "CSt30",
                    "CSt31" => "CSt31",
                    "CSt32" => "CSt32",
                    "CSt33" => "CSt33",
                    "CSt34" => "CSt34",
                    "CSt35" => "CSt35",
                    "CSt36" => "CSt36",
                    "CSt37" => "CSt37",
                    "CSt38" => "CSt38",
                    "CSt39" => "CSt39",
                    "CSt40" => "CSt40",
                    "CSt41" => "CSt41",
                    "CSt42" => "CSt42",
                    "CSt43" => "CSt43",
                    "CSt44" => "CSt44",
                    "CSt45" => "CSt45",
                    "CFi121" => "CFi121",
                    "CFi122" => "CFi122",
                    "CFi123" => "CFi123",
                    "CFi124" => "CFi124",
                    "CFi125" => "CFi125",
                    "CFi126" => "CFi126",
                    "CFi127" => "CFi127",
                    "CFi128" => "CFi128",
                    "CFi129" => "CFi129",
                    "CFi130" => "CFi130",
                    "CFi131" => "CFi131",
                    "CFi132" => "CFi132",
                    "CSt52" => "CSt52",
                    "CSt46" => "CSt46",
                    "CSt47" => "CSt47",
                    "CSt48" => "CSt48",
                    "CSt49" => "CSt49",
                    "CLa26" => "CLa26",
                    "CLa27" => "CLa27",
                    "CLa28" => "CLa28",
                    "CLa29" => "CLa29",
                    "CFi133" => "CFi133",
                    "CFi134" => "CFi134",
                    "CFi135" => "CFi135",
                    "CFi136" => "CFi136",
                    "CFi137" => "CFi137",
                    "CFi138" => "CFi138",
                    "CFi139" => "CFi139",
                    "CFi140" => "CFi140",
                    "CFi141" => "CFi141",
                    "CSt50" => "CSt50",
                    "CSt51" => "CSt51",
                    "CFi142" => "CFi142",
                    "CFi143" => "CFi143",
                    "CFi144" => "CFi144",
                    "CFi145" => "CFi145",
                    "CFi146" => "CFi146",
                    "CFi147" => "CFi147",
                    "CFi148" => "CFi148",
                    "CFi149" => "CFi149",
                    "CFi150" => "CFi150",
                    "CFi151" => "CFi151",
                    "CFi152" => "CFi152",
                    "CFi153" => "CFi153",
                    "CFi154" => "CFi154",
                    "CSt55" => "CSt55",
                    "CLa30" => "CLa30",
                    "CLa31" => "CLa31",
                    "CFi156" => "CFi156",
                    "CFi157" => "CFi157",
                    "CSt56" => "CSt56",
                    "CSt57" => "CSt57",
                    "CFi158" => "CFi158",
                    "CFi159" => "CFi159",
                    "CFi160" => "CFi160",
                    "CFi161" => "CFi161",
                    "CFi162" => "CFi162",
                    "CFi163" => "CFi163",
                    "CFi164" => "CFi164",
                    "CFi165" => "CFi165",
                    "CFi166" => "CFi166",
                    "CFi167" => "CFi167",
                    "CFi168" => "CFi168",
                    "CFi169" => "CFi169",
                    "CFi170" => "CFi170",
                    "CFi171" => "CFi171",
                    "CLa32" => "CLa32",
                    "CLa33" => "CLa33",
                    "CLa34" => "CLa34",
                    "CLa40" => "CLa40",
                    "CLa36" => "CLa36",
                    "CFi172" => "CFi172",
                    "CFi173" => "CFi173",
                    "CFi174" => "CFi174",
                    "CFi175" => "CFi175",
                    "CFi176" => "CFi176",
                    "CSt58" => "CSt58",
                    "CFi177" => "CFi177",
                    "CFi178" => "CFi178",
                    "CFi179" => "CFi179",
                    "CSt59" => "CSt59",
                    "CFi180" => "CFi180",
                    "CFi181" => "CFi181",
                    "CFi182" => "CFi182",
                    "CSt60" => "CSt60",
                    "CFi183" => "CFi183",
                    "CFi184" => "CFi184",
                    "CSt61" => "CSt61",
                    "CFi185" => "CFi185",
                    "CFi186" => "CFi186",
                    "CFi189" => "CFi189",
                    "CFi191" => "CFi191",
                    "CSt65" => "CSt65",
                    "CFi207" => "CFi207",
                    "CFi208" => "CFi208",
                    "CSt66" => "CSt66",
                    "CFi210" => "CFi210",
                    "CSt67" => "CSt67",
                    "CFi211" => "CFi211",
                    "CFi212" => "CFi212",
                    "CFi213" => "CFi213",
                    "CSt68" => "CSt68",
                    "CFi216" => "CFi216",
                    "CFi218" => "CFi218",
                    "CFi220" => "CFi220",
                    "CFi221" => "CFi221",
                    "CFi222" => "CFi222",
                    "CFi226" => "CFi226",
                    "CFi227" => "CFi227",
                    "CSt71" => "CSt71",
                    "CSt74" => "CSt74",
                    "CFi232" => "CFi232",
                    "CFi233" => "CFi233",
                    "CFi234" => "CFi234",
                    "CFi235" => "CFi235",
                    "CFi236" => "CFi236",
                    "CFi237" => "CFi237",
                    "CFi238" => "CFi238",
                    "CFi239" => "CFi239",
                    "CFi240" => "CFi240",
                    "CFi241" => "CFi241",
                    "CFi245" => "CFi245",
                    "CFi246" => "CFi246",
                    "BLa35" => "BLa35",
                    "CFi250" => "CFi250",
                    "CFi251" => "CFi251",
                    "CLa37" => "CLa37",
                    "CLa38" => "CLa38",
                    "CLa39" => "CLa39",
                    "CFi270" => "CFi270",
                    "CFi271" => "CFi271",
                    "CLa40" => "CLa40",
                    "CLa41" => "CLa41",
                    "CLa42" => "CLa42",
                    "CFi272" => "CFi272",
                    "CFi273" => "CFi273",
                    "CFi275" => "CFi275",
                    "CFi276" => "CFi276",
                    "CFi277" => "CFi277",
                    "CFi252" => "CFi252",
                    "CFi278 " => "CFi278 ",
                    "CFi279" => "CFi279",
                    "CFi280" => "CFi280",
                    "CFi281" => "CFi281",
                    "CFi282" => "CFi282",
                    "CFi283" => "CFi283",
                    "CFi284" => "CFi284",
                    "CFi285" => "CFi285",
                    "CFi286" => "CFi286",
                    "CFi287" => "CFi287",
                    "LaO-01" => "LaO-01",
                    "LaO-02" => "LaO-02",
                    "LaO-03" => "LaO-03",
                    "LaO-04" => "LaO-04",
                    "LaO-05" => "LaO-05",
                    "CLa46" => "CLa46",
                    "CLa44" => "CLa44",
                    "CFi288" => "CFi288",
                    "CLa45" => "CLa45",
                    "CSt72" => "CSt72",
                    "CSt73" => "CSt73",
                    "CSt75" => "CSt75",
                    "CGo01" => "CGo01",
                    "CFi289" => "CFi289",
                    "CFi290" => "CFi290",
                    "CFi291" => "CFi291",
                    "CFi292" => "CFi292",
                    "CFi293" => "CFi293",
                    "CFi294" => "CFi294",
                    "CFi295" => "CFi295",
                    "CFi296" => "CFi296",
                    "CFi297" => "CFi297",
                    "CFi298" => "CFi298",
                    "CFi299" => "CFi299",
                    "CFi300" => "CFi300",
                    "CFi301" => "CFi301",
                    "CLa47" => "CLa47",
                    "CLa48" => "CLa48",
                    "CLa49" => "CLa49"
                ],
            ],
            'map' => [
                'attribute_group' => 'L4'
            ]
        ],
        'payment_acceptance' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Acceptance',
                'options' => [
                    'agree' => 'Agree to pay',
                    'decline' => 'Decline to pay'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'full_name' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Full Name',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'phone' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Phone',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'date_of_birth' => [
            'attribute' => [
                'backend_type' => 'date',
                'frontend_type' => 'date',
                'frontend_label' => 'Date of birth',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'address_cod' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Address COD',
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'payment_status' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Status',
                'options' => [
                    'proceed' => 'Proceed to payment',
                    'considering' => 'Considering',
                    'decline' => 'Decline to pay'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'payment_method' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Method',
                'options' => [
                    'cod' => 'COD',
                    'wire_transfer' => 'Wire Transfer'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'package_id' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Package',
                'is_required' => 1,
                'options' => [
                    'fit_30' => 'Fit 30',
                    'fit_50' => 'Fit 50',
                    'fit_70' => 'Fit 70',
                    'la_training' => 'La Training',
                    'la_online' => 'La Online',
                    'star_24' => 'Star 24',
                    'star_48' => 'Star 48',
                ],
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'package_value' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'text',
                'frontend_label' => 'Package Value',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'payment_amount' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'text',
                'frontend_label' => 'Payment Amount',
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L7'
            ]
        ],
        'payment_fulfillment' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Fulfillment',
                'is_required' => 1,
                'options' => [
                    '0' => 'No',
                    '1' => 'Yes',
                ],
            ],
            'map' => [
                'attribute_group' => 'L7'
            ]
        ],
        'current_level' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'hidden',
                'frontend_label' => 'Current Level',
                'is_required' => 0,
            ],
            'map' => []
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            $entityCode = 'ticket';
            $attributeSetName = 'Sale Attribute Set';
            $entity = Eav\Entity::findByCode($entityCode);

            $attributeSet = Eav\AttributeSet::create([
                'attribute_set_name' => $attributeSetName,
                'entity_id' => $entity->entity_id,
            ]);

            $levelGroups = [];
            for ($i = 1; $i <= 8; $i++) {
                $levelGroups[] = Eav\AttributeGroup::create([
                    'attribute_group_name' => 'L' . $i,
                    'attribute_set_id' => $attributeSet->attribute_set_id,
                    'sequence' => $i
                ]);
            }

            $levelGroups[] = Eav\AttributeGroup::create([
                'attribute_group_name' => 'General',
                'attribute_set_id' => $attributeSet->attribute_set_id,
                'sequence' => 99999
            ]);

            $saleAttributes = $this->saleAttributes;

            foreach ($saleAttributes as $attributeName => $attribute) {
                $defaultAttr = [
                    'attribute_code' => $attributeName,
                    'entity_code' => $entityCode,
                    'backend_class' => null,
                    'backend_type' => 'int',
                    'backend_table' => null,
                    'frontend_class' => null,
                    'frontend_type' => 'select',
                    'frontend_label' => 'Status',
                    'source_class' => null,
                    'default_value' => 0,
                    'is_required' => 0,
                    'is_filterable' => 0,
                    'is_searchable' => 0,
                    'required_validate_class' => null
                ];
                $attr = array_merge($defaultAttr, $attribute['attribute']);
                Eav\Attribute::add($attr);

                $defaultMap = [
                    'attribute_code' => $attributeName,
                    'entity_code' => $entityCode,
                    'attribute_set' => $attributeSetName,
                    'attribute_group' => 'General'
                ];
                $map = array_merge($defaultMap, $attribute['map']);
                Eav\EntityAttribute::map($map);
            }
            \Illuminate\Support\Facades\DB::commit();
        } catch (Exception $exception) {
            \Illuminate\Support\Facades\DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
