#twitterOAuthLogin


###これはなに？

twitterのOAuth認証でログインする部分のPHPソースです。twitter認証のアプリをつくりたいときにお使い下さい。OAuth認証の部分は<a href="https://github.com/abraham/twitteroauth" target="_blank">abraham/twitteroauth</a>を使っています。

### 準備するものなど

<li><a href="https://dev.twitter.com/apps" target="_blank">Twitter Applications</a>にマイアプリをつくる</li>
<li>↑でつくったマイアプリの<b>Consumer key</b>と<b>Consumer secret</b></li>
<li>PHPの動くWebサーバー</li>

### 設定項目
config.phpに<b>Consumer key</b>と<b>Consumer secret</b>と<b>callback.phpを置いた場所のURL</b>を書く