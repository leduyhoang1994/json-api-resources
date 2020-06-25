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
					"L2901/002A" => "L2901/002A Ngọc Hà",
					"L2901/002B" => "L2901/002B Ngọc Hà",
					"L2901/003A" => "L2901/003A Trần Huy Liệu",
					"L2901/005A" => "L2901/005A Đội Cấn",
					"L2903/006A" => "L2903/006A A4-Trần Đăng Ninh",
					"L2903/006B" => "L2903/006B A4-Trần Đăng Ninh",
					"L2903/010A" => "L2903/010A Quan Hoa",
					"L2903/011A" => "L2903/011A Hoàng Ngân",
					"L2904/012A" => "L2904/012A Nguyễn Chí Thanh",
					"L2904/014A" => "L2904/014A Xã Đàn",
					"L2904/016A" => "L2904/016A Pháo Đài Láng",
					"L2904/017A" => "L2904/017A Nam Đồng",
					"L2905/018A" => "L2905/018A Nguyễn Khuyến",
					"L2905/019A" => "L2905/019A Rainbow",
					"L2906/020A" => "L2906/020A Phố Huế",
					"L2906/021B" => "L2906/021B Phố Huế",
					"L2906/022A" => "L2906/022A Mai Hắc Đế",
					"L2906/023A" => "L2906/023A Tuệ Tĩnh",
					"L2906/025A" => "L2906/025A Kim Ngưu",
					"L2906/026A" => "L2906/026A Lạc Trung",
					"L2906/026B" => "L2906/026B Lạc Trung",
					"L2907/028A" => "L2907/028A Yết Kiêu",
					"L2908/029A" => "L2908/029A Trần Điền",
					"L2908/030A" => "L2908/030A Trương Định",
					"L2912/031A" => "L2912/031A Quan Nhân",
					"F1405/039A" => "F1405/039A Mon Bay",
					"F1405/039B" => "F1405/039B Mon Bay",
					"L2906/041A" => "L2906/041A Bà Triệu",
					"L2904/048A" => "L2904/048A Hào Nam",
					"L2903/049A" => "L2903/049A Phạm Văn Đồng",
					"L2912/051A" => "L2912/051A Nguyễn Trãi",
					"L2912/051B" => "L2912/051B Nguyễn Trãi",
					"F1506/052A" => "F1506/052A Trần Nguyên Hãn",
					"L2904/053A" => "L2904/053A Trung Liệt",
					"F3410/056A" => "F3410/056A Cửa Thẻ",
					"F1101/057A" => "F1101/057A Phố Cũ",
					"F1405/058A" => "F1405/058A Hùng Thắng",
					"L2908/059A" => "L2908/059A Linh Đường",
					"L2903/060A" => "L2903/060A Nguyễn Khang",
					"L2901/061A" => "L2901/061A Hồ Giám",
					"L2904/062A" => "L2904/062A Cát Linh",
					"L2904/063A" => "L2904/063A Tôn Đức Thắng",
					"L2904/063B" => "L2904/063B Tôn Đức Thắng",
					"L2908/064A" => "L2908/064A ",
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
					"CFi01" => "CFi01 Ngọc Hà",
					"CFi02" => "CFi02 Ngọc Hà",
					"CFi03" => "CFi03 Ngọc Hà",
					"CFi04" => "CFi04 Ngọc Hà",
					"CFi05" => "CFi05 Ngọc Hà",
					"CFi06" => "CFi06 Ngọc Hà",
					"CFi07" => "CFi07 Ngọc Hà",
					"CFi08" => "CFi08 Trần Huy Liệu",
					"CFi09" => "CFi09 Trần Huy Liệu",
					"CFi10" => "CFi10 Trần Huy Liệu",
					"CFi11" => "CFi11 Trần Huy Liệu",
					"CFi12" => "CFi12 Nguyễn Chí Thanh",
					"CFi13" => "CFi13 Nguyễn Chí Thanh",
					"CFi14" => "CFi14 Nguyễn Chí Thanh",
					"CFi15" => "CFi15 Tôn Đức Thắng",
					"CFi16" => "CFi16 Cát Linh",
					"CFi18" => "CFi18 Xã Đàn",
					"CFi19" => "CFi19 Xã Đàn",
					"CFi20" => "CFi20 Xã Đàn",
					"CFi21" => "CFi21 Xã Đàn",
					"CFi22" => "CFi22 Xã Đàn",
					"CFi23" => "CFi23 Xã Đàn",
					"CFi24" => "CFi24 Yết Kiêu",
					"CFi25" => "CFi25 Yết Kiêu",
					"CFi26" => "CFi26 Phố Huế",
					"CFi27" => "CFi27 Phố Huế",
					"CFi28" => "CFi28 Phố Huế",
					"CFi29" => "CFi29 Phố Huế",
					"CFi30" => "CFi30 Phố Huế",
					"CFi31" => "CFi31 Lạc Trung",
					"CFi32" => "CFi32 Lạc Trung",
					"CFi33" => "CFi33 A4-Trần Đăng Ninh",
					"CFi34" => "CFi34 A4-Trần Đăng Ninh",
					"CFi35" => "CFi35 A4-Trần Đăng Ninh",
					"CFi36" => "CFi36 A4-Trần Đăng Ninh",
					"CFi37" => "CFi37 A4-Trần Đăng Ninh",
					"CFi38" => "CFi38 A4-Trần Đăng Ninh",
					"CFi39" => "CFi39 A4-Trần Đăng Ninh",
					"CFi40" => "CFi40 A4-Trần Đăng Ninh",
					"CFi42" => "CFi42 Rainbow",
					"CFi43" => "CFi43 Nguyễn Khuyến",
					"CFi44" => "CFi44 Mai Hắc Đế",
					"CFi46" => "CFi46 Pháo Đài Láng",
					"CFi47" => "CFi47 Trần Huy Liệu",
					"CFi48" => "CFi48 Trần Huy Liệu",
					"CFi49" => "CFi49 Phố Huế",
					"CFi50" => "CFi50 Nguyễn Chí Thanh",
					"CFi52" => "CFi52 Trần Huy Liệu",
					"CFi53" => "CFi53 Trần Huy Liệu",
					"CFi54" => "CFi54 Nguyễn Khuyến",
					"CFi55" => "CFi55 Trần Huy Liệu",
					"CFi57" => "CFi57 Nguyễn Khuyến",
					"CFi58" => "CFi58 Phố Huế",
					"CFi59" => "CFi59 Tuệ Tĩnh",
					"CFi60" => "CFi60 Pháo Đài Láng",
					"CFi61" => "CFi61 Pháo Đài Láng",
					"CFi62" => "CFi62 Ngọc Hà",
					"CFi63" => "CFi63 Phố Huế",
					"CFi64" => "CFi64 Trần Huy Liệu",
					"CFi65" => "CFi65 Kim Ngưu",
					"CFi66" => "CFi66 Lạc Trung",
					"CFi68" => "CFi68 Quan Nhân",
					"CFi69" => "CFi69 Trần Điền",
					"CFi70" => "CFi70 Trần Điền",
					"CFi71" => "CFi71 Ngọc Hà",
					"CFi72" => "CFi72 Pháo Đài Láng",
					"CFi73" => "CFi73 Xã Đàn",
					"CFi74" => "CFi74 Ngọc Hà",
					"CFi75" => "CFi75 Lạc Trung",
					"CFi76" => "CFi76 Lạc Trung",
					"CFi77" => "CFi77 Trương Định",
					"CFi78" => "CFi78 Quan Hoa",
					"CFi79" => "CFi79 A4-Trần Đăng Ninh",
					"CFi81" => "CFi81 Lạc Trung",
					"CFi82" => "CFi82 Lạc Trung",
					"CFi83" => "CFi83 Lạc Trung",
					"CFi84" => "CFi84 Lạc Trung",
					"CFi85" => "CFi85 Trần Huy Liệu",
					"CFi86" => "CFi86 Nguyễn Khuyến",
					"CFi87" => "CFi87 Hoàng Ngân",
					"CFi88" => "CFi88 Hào Nam",
					"CFi89" => "CFi89 Hào Nam",
					"CFi90" => "CFi90 Hào Nam",
					"CFi91" => "CFi91 Lạc Trung",
					"CFi92" => "CFi92 Tuệ Tĩnh",
					"CFi93" => "CFi93 Rainbow",
					"CFi94" => "CFi94 Hoàng Ngân",
					"CFi95" => "CFi95 A4-Trần Đăng Ninh",
					"CFi98" => "CFi98 Trương Định",
					"CFi102" => "CFi102 Đội Cấn",
					"CFi103" => "CFi103 Tuệ Tĩnh",
					"CFi104" => "CFi104 Tuệ Tĩnh",
					"CFi105" => "CFi105 Quan Hoa",
					"CFi106" => "CFi106 A4-Trần Đăng Ninh",
					"CFi107" => "CFi107 Xã Đàn",
					"CFi108" => "CFi108 Hào Nam",
					"CFi109" => "CFi109 Trần Huy Liệu",
					"CFi110" => "CFi110 Hào Nam",
					"CFi111" => "CFi111 Hào Nam",
					"CFi112" => "CFi112 Lạc Trung",
					"CFi113" => "CFi113 Lạc Trung",
					"CFi114" => "CFi114 Lạc Trung",
					"CFi115" => "CFi115 Lạc Trung",
					"CFi116" => "CFi116 Tuệ Tĩnh",
					"CFi117" => "CFi117 Lạc Trung",
					"CFi118" => "CFi118 Trần Huy Liệu",
					"CFi119" => "CFi119 Tuệ Tĩnh",
					"CFi120" => "CFi120 Tuệ Tĩnh",
					"CLa01" => "CLa01 Trần Huy Liệu",
					"CLa02" => "CLa02 Trần Huy Liệu",
					"CLa03" => "CLa03 Trần Huy Liệu",
					"CLa04" => "CLa04 Ngọc Hà",
					"CLa06" => "CLa06 Trần Huy Liệu",
					"CLa07" => "CLa07 Ngọc Hà",
					"CLa08" => "CLa08 Ngọc Hà",
					"CLa09" => "CLa09 Pháo Đài Láng",
					"CLa10" => "CLa10 Pháo Đài Láng",
					"CLa11" => "CLa11 Trần Huy Liệu",
					"CLa12" => "CLa12 Ngọc Hà",
					"CLa13" => "CLa13 Lạc Trung",
					"CLa14" => "CLa14 Lạc Trung",
					"CLa15" => "CLa15 Lạc Trung",
					"CLa16" => "CLa16 Lạc Trung",
					"CLa17" => "CLa17 Tuệ Tĩnh",
					"CLa18" => "CLa18 Quan Hoa",
					"CLa19" => "CLa19 Quan Hoa",
					"CLa20" => "CLa20 Tuệ Tĩnh",
					"CLa21" => "CLa21 Ngọc Hà",
					"CLa22" => "CLa22 Trần Huy Liệu",
					"CLa23" => "CLa23 Trung Liệt",
					"CLa24" => "CLa24 Trần Huy Liệu",
					"CLa25" => "CLa25 Trần Huy Liệu",
					"CSt01" => "CSt01 Hồ Giám",
					"CSt02" => "CSt02 Hồ Giám",
					"CSt03" => "CSt03 Hồ Giám",
					"CSt04" => "CSt04 Cát Linh",
					"CSt05" => "CSt05 Cát Linh",
					"CSt06" => "CSt06 Cát Linh",
					"CSt08" => "CSt08 A4-Trần Đăng Ninh",
					"CSt09" => "CSt09 Xã Đàn",
					"CSt10" => "CSt10 Xã Đàn",
					"CSt11" => "CSt11 Lạc Trung",
					"CSt12" => "CSt12 Lạc Trung",
					"CSt15" => "CSt15 Trần Huy Liệu",
					"CSt16" => "CSt16 Trần Huy Liệu",
					"CSt17" => "CSt17 Tuệ Tĩnh",
					"CSt18" => "CSt18 Nguyễn Khuyến",
					"CSt19" => "CSt19 A4-Trần Đăng Ninh",
					"CSt20" => "CSt20 Tôn Đức Thắng",
					"CSt21" => "CSt21 Cát Linh",
					"CSt22" => "CSt22 Nguyễn Khuyến",
					"CSt23" => "CSt23 Nam Đồng",
					"CSt24" => "CSt24 Tuệ Tĩnh",
					"CSt27" => "CSt27 A4-Trần Đăng Ninh",
					"CSt28" => "CSt28 Hồ Giám",
					"CSt29" => "CSt29 Nguyễn Khuyến",
					"CSt30" => "CSt30 Kim Ngưu",
					"CSt31" => "CSt31 Kim Ngưu",
					"CSt32" => "CSt32 A4-Trần Đăng Ninh",
					"CSt34" => "CSt34 Nguyễn Khuyến",
					"CSt35" => "CSt35 Trần Huy Liệu",
					"CSt36" => "CSt36 A4-Trần Đăng Ninh",
					"CSt37" => "CSt37 Pháo Đài Láng",
					"CSt38" => "CSt38 Trần Điền",
					"CSt39" => "CSt39 Lạc Trung",
					"CSt40" => "CSt40 Nguyễn Trãi",
					"CSt42" => "CSt42 Nguyễn Khuyến",
					"CSt43" => "CSt43 Trung Liệt",
					"CSt44" => "CSt44 Trung Liệt",
					"CSt45" => "CSt45 Trần Huy Liệu",
					"CFi121" => "CFi121 Trần Huy Liệu",
					"CFi122" => "CFi122 Đội Cấn",
					"CFi123" => "CFi123 Linh Đường",
					"CFi126" => "CFi126 Linh Đường",
					"CFi127" => "CFi127 Linh Đường",
					"CFi131" => "CFi131 Phạm Văn Đồng",
					"CFi132" => "CFi132 Phạm Văn Đồng",
					"CSt52" => "CSt52 Tuệ Tĩnh",
					"CSt46" => "CSt46 Tuệ Tĩnh",
					"CSt47" => "CSt47 Lạc Trung",
					"CSt48" => "CSt48 Lạc Trung",
					"CLa26" => "CLa26 Ngọc Hà",
					"CLa27" => "CLa27 Trần Huy Liệu",
					"CLa28" => "CLa28 Lạc Trung",
					"CLa29" => "CLa29 Tuệ Tĩnh",
					"CFi133" => "CFi133 Mon Bay",
					"CFi134" => "CFi134 Mon Bay",
					"CFi135" => "CFi135 Mon Bay",
					"CFi136" => "CFi136 Mon Bay",
					"CFi137" => "CFi137 Mon Bay",
					"CFi138" => "CFi138 Mon Bay",
					"CFi139" => "CFi139 Mon Bay",
					"CFi140" => "CFi140 Mon Bay",
					"CFi141" => "CFi141 Mon Bay",
					"CSt50" => "CSt50 Mon Bay",
					"CSt51" => "CSt51 Mon Bay",
					"CFi142" => "CFi142 Lạc Trung",
					"CFi143" => "CFi143 Bà Triệu",
					"CFi144" => "CFi144 Cát Linh",
					"CFi145" => "CFi145 Cát Linh",
					"CFi146" => "CFi146 Cát Linh",
					"CFi147" => "CFi147 Nguyễn Khang",
					"CFi148" => "CFi148 Nguyễn Khang",
					"CSt55" => "CSt55 Lạc Trung",
					"CLa30" => "CLa30 Nguyễn Trãi",
					"CFi156" => "CFi156 Mon Bay",
					"CFi157" => "CFi157 Mon Bay",
					"CSt56" => "CSt56 Mon Bay",
					"CSt57" => "CSt57 Mon Bay",
					"CFi158" => "CFi158 Mon Bay",
					"CFi159" => "CFi159 Mon Bay",
					"CFi160" => "CFi160 Mon Bay",
					"CFi161" => "CFi161 Mon Bay",
					"CFi162" => "CFi162 Mon Bay",
					"CFi163" => "CFi163 Mon Bay",
					"CFi164" => "CFi164 Mon Bay",
					"CFi165" => "CFi165 Mon Bay",
					"CFi166" => "CFi166 Mon Bay",
					"CFi167" => "CFi167 Phố Huế",
					"CFi170" => "CFi170 Mon Bay",
					"CFi171" => "CFi171 Mon Bay",
					"CLa32" => "CLa32 Ngọc Hà",
					"CLa33" => "CLa33 Ngọc Hà",
					"CLa34" => "CLa34 Linh Đường",
					"CLa36" => "CLa36 Tuệ Tĩnh",
					"CFi173" => "CFi173 Nguyễn Trãi",
					"CFi174" => "CFi174 Nguyễn Trãi",
					"CFi175" => "CFi175 Nguyễn Trãi",
					"CFi176" => "CFi176 Nguyễn Trãi",
					"CSt58" => "CSt58 Nguyễn Trãi",
					"CFi177" => "CFi177 Nguyễn Trãi",
					"CFi178" => "CFi178 Nguyễn Trãi",
					"CFi179" => "CFi179 Nguyễn Trãi",
					"CSt59" => "CSt59 Nguyễn Trãi",
					"CFi180" => "CFi180 Nguyễn Trãi",
					"CFi181" => "CFi181 Nguyễn Trãi",
					"CFi182" => "CFi182 Nguyễn Trãi",
					"CSt60" => "CSt60 Nguyễn Trãi",
					"CFi183" => "CFi183 Nguyễn Trãi",
					"CFi184" => "CFi184 Nguyễn Trãi",
					"CSt61" => "CSt61 Nguyễn Trãi",
					"CFi185" => "CFi185 Nguyễn Trãi",
					"CFi186" => "CFi186 Nguyễn Trãi",
					"CSt65" => "CSt65",
					"CFi211" => "CFi211 Cát Linh",
					"CFi216" => "CFi216 Trần Nguyên Hãn",
					"CFi218" => "CFi218 Trần Nguyên Hãn",
					"CFi220" => "CFi220 Trần Nguyên Hãn",
					"CFi221" => "CFi221 Trần Nguyên Hãn",
					"CFi222" => "CFi222 Trần Nguyên Hãn",
					"CFi226" => "CFi226 Trần Nguyên Hãn",
					"CFi227" => "CFi227 Trần Nguyên Hãn",
					"CSt71" => "CSt71 Trần Nguyên Hãn",
					"CSt74" => "CSt74 Mon Bay",
					"CFi232" => "CFi232 Mon Bay",
					"CFi233" => "CFi233 Mon Bay",
					"CFi234" => "CFi234 Mon Bay",
					"CFi235" => "CFi235 Phố Huế",
					"CFi236" => "CFi236 Hào Nam",
					"CFi237" => "CFi237 Trung Liệt",
					"CFi238" => "CFi238 Trung Liệt",
					"CFi239" => "CFi239 Trung Liệt",
					"CFi240" => "CFi240 Trung Liệt",
					"CFi241" => "CFi241 Trung Liệt",
					"CFi245" => "CFi245 Nguyễn Khuyến",
					"BLa35" => "BLa35 Trần Huy Liệu",
					"CFi250" => "CFi250 Mon Bay",
					"CLa37" => "CLa37 Trần Huy Liệu",
					"CLa38" => "CLa38 Nguyễn Trãi",
					"CLa39" => "CLa39 Tuệ Tĩnh",
					"CFi270" => "CFi270 Cửa Thẻ",
					"CFi271" => "CFi271 Cửa Thẻ",
					"CLa40" => "CLa40 Trung Liệt",
					"CLa41" => "CLa41 Trung Liệt",
					"CLa42" => "CLa42 Trung Liệt",
					"CFi272" => "CFi272 Ngọc Hà",
					"CFi273" => "CFi273 Trần Huy Liệu",
					"CFi276" => "CFi276 Mai Hắc Đế",
					"CFi277" => "CFi277 Tuệ Tĩnh",
					"CFi252" => "CFi252 Nguyễn Trãi",
					"CFi278 " => "CFi278 Quan Hoa",
					"CFi279" => "CFi279 Nguyễn Khang",
					"CFi280" => "CFi280 Nguyễn Khang",
					"CFi281" => "CFi281 Cửa Thẻ",
					"CFi282" => "CFi282 Phố Cũ",
					"CFi283" => "CFi283 Phố Cũ",
					"CFi284" => "CFi284 Phố Huế",
					"CFi285" => "CFi285 Phố Huế",
					"CFi286" => "CFi286 Phố Cũ",
					"CFi287" => "CFi287 Phố Cũ",
					"CLa46" => "CLa46 Nguyễn Khang",
					"CLa44" => "CLa44 Nguyễn Khang",
					"CFi288" => "CFi288 Mon Bay",
					"CLa45" => "CLa45 Nguyễn Trãi",
					"CSt73" => "CSt73 Nguyễn Chí Thanh",
					"CSt75" => "CSt75 Trung Liệt",
					"CGo01" => "CGo01 Hùng Thắng",
					"CFi289" => "CFi289 Hùng Thắng",
					"CFi290" => "CFi290 Lạc Trung",
					"CFi291" => "CFi291 Lạc Trung",
					"CFi292" => "CFi292 Trung Liệt",
					"CFi293" => "CFi293 Trung Liệt",
					"CFi294" => "CFi294 Hào Nam",
					"CFi295" => "CFi295 Nguyễn Trãi",
					"CFi296" => "CFi296 Nguyễn Trãi",
					"CFi297" => "CFi297 Nguyễn Khang",
					"CFi298" => "CFi298 Mon Bay",
					"CFi299" => "CFi299 Mon Bay",
					"CFi300" => "CFi300 Mon Bay",
					"CFi301" => "CFi301 Hùng Thắng",
					"CLa47" => "CLa47 Nguyễn Khang",
					"CLa48" => "CLa48 Trung Liệt",
					"CLa49" => "CLa49 Tuệ Tĩnh",
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
		'order_id' => [
			'attribute' => [
				'backend_type' => 'integer',
				'frontend_type' => 'order',
				'frontend_label' => 'Order',
				'is_required' => 1
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
					'wire_transfer' => 'Wire Transfer',
					'cash_office' => 'Cash Office',
					'card' => 'Card',
					'card_studio' => 'Card Studio'
				],
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
