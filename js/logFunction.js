function randombg(){
  var random= Math.floor(Math.random() * 13 ) + 0;
  var truc = [
    "url('/../APPwebsite2/Style/bg/bg0.jpg')",
    "url('/../APPwebsite2/Style/bg/bg1.jpg')",
    "url('/../APPwebsite2/Style/bg/bg2.jpg')",
    "url('/../APPwebsite2/Style/bg/bg3.jpg')",
    "url('/../APPwebsite2/Style/bg/bg4.jpg')",
    "url('/../APPwebsite2/Style/bg/bg5.jpg')",
    "url('/../APPwebsite2/Style/bg/bg6.jpg')",
    "url('/../APPwebsite2/Style/bg/bg7.jpg')",
    "url('/../APPwebsite2/Style/bg/bg8.jpg')",
    "url('/../APPwebsite2/Style/bg/bg9.jpg')",
    "url('/../APPwebsite2/Style/bg/bg10.jpg')",
    "url('/../APPwebsite2/Style/bg/bg11.jpg')",
    "url('/../APPwebsite2/Style/bg/bg12.jpg')",
    "url('/../APPwebsite2/Style/bg/bg13.jpg')"
  ];
  document.body.style.backgroundImage=truc[random];
}
