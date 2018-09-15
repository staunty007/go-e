function backgroundSlide() {

  const images= ['/images/6oUsyeYXgTg.jpg','/images/transformers.jpg',];
  let url = 0;
  setInterval(function(){
  url+=1;
  if(url==2){
    url=0;
  }
  let banner = document.getElementById("banner");
  banner.style.backgroundImage = 'url('+images[url]+')';
  banner.style.backgroundRepeat = "no-repeat";
  banner.style.height = '100%';
  banner.style.width = '100vw';
    },10000);

}
backgroundSlide();

