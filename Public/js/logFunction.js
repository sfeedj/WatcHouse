function randombg(){
  var random= Math.floor(Math.random() * 13 ) + 0;
  var truc = [
    "url('/../APPwebsite2/Public/images/bg/bg0.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg1.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg2.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg3.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg4.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg5.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg6.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg7.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg8.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg9.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg10.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg11.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg12.jpg')",
    "url('/../APPwebsite2/Public/images/bg/bg13.jpg')"
  ];
  document.body.style.backgroundImage=truc[random];
}
