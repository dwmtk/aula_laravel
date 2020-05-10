{{ $user->name }} 様

この度、aulaの出張洗車をご利用いただきありがとうございます。
下記の内容の予約キャンセルを承りましたので、ご確認ください。

また、次回予約時は、今回お支払金額を差し引いた金額でご利用頂けます。
今回お支払金額：￥{{ $order->final_price }}

今後とも、aulaをよろしくお願いいたします。

———————————————————————————

《洗車情報》
・洗車日:{{ date('Y/m/d',  strtotime($order->order_date)) }}
・洗車時間帯:@if ( $order->schedule == 1)
08:00～11:00
@elseif ( $order->schedule == 2)
11:00～14:00
@elseif ( $order->schedule == 3)
14:00～17:00
@elseif ( $order->schedule == 4)@endif
・洗車車両:{{ $order->car_maker }}
・車両ナンバー:{{ $order->car_number }}
・車体色:{{ $order->car_color }}
・駐車場:{{ $order->parking_city }} {{ $order->parking_address }} {{ $order->parking_building }} {{ $order->parking_detail }}

《お支払い情報》
・洗車料金:￥{{ $order->price }}
・お支払い料金:￥{{ $order->final_price }}

———————————————————————————

出張洗車利用時のポイント

お客様のお車をより丁寧、確実に洗車する為、
下記のURLに記載されている洗車時のポイントを
ご確認いただけると幸いです。

https://xd.adobe.com/view/、031c34d6-05b0-461c-6922-73e53bc79ac7-752d/
(アライクの注意事項の様なページ)

———————————————————————————

ご予約のキャンセルについて

出張洗車のご予約をキャンセルしたい場合は、
下記のサイトにログインしていただき、
詳細の確認、キャンセルを実行出来ます。

https://xd.adobe.com/view/、031c34d6-05b0-461c-6922-73e53bc79ac7-752d/

———————————————————————————

お問い合わせについて

洗車や、HP等に関するご質問等ございましたら、
aulaにご登録していただいているメールアドレスにて、
下記のメールアドレス宛にご連絡ください。

contact@aula.blue

また、問い合わせ後、稼働日で2日経過しても、
aulaから返答がない場合、下記の電話番号にご連絡ください。

072-4545-1919