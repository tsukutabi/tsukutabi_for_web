# tsukutabi for web

旅行のまとめサイト"tsukutabi"のコードまとめ!!

暫定 メインフレームワークはcakephp2だけど　早めに3にバージョンを上げたい


##controller規約

自作した直接使わない関数はMyFunctionsComponentにまとめる

スマホ/web共通で使う関数は httprequestComponentにまとめる

sql系はSqlComponentにまとめる

controllerは薄く!!　基本的にcomponentを呼び出す方針で

##model規約

極力sqlを書く!!
favとcommentsはアソシエーション使うよ

##viewでのphp処理を減らす!!!!
写真が動く時とかはjquery
コメントはangular.jsで 記事が出てたからそれ流用しようかな


(csrf_xss対策用のaccess token送り忘れるとblack holeエラーになるので要注意)

###TODO

security component 
tokenつける

jsonの再設計>>余計なデータ返さないようにする。
viewで処理が多くなってるので減らす


###共有規約
SNSログイン機能は実装しない

# do travel share it
