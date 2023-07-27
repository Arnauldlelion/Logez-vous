window.addEventListener('scroll', function(){
  var header = this.document.querySelector('header');
  header.classList.toggle('sticky', this.window.scrollY > 0);
})
const nav = document.querySelector('nav');
window.addEventListener('scroll', function () {
  if (window.pageXOffset > 100) {
    nav.classList.add('bg-dark', 'shadow');
  }
  else {
    nav.classList.remove('bg-dark', 'shadow');
  }
});

const text = document.querySelector('.text');
const moreText = document.querySelector('.more-text');

text.addEventListener('click', function() {
    if (moreText.style.display === 'none') {
        moreText.style.display = 'block';
    } else {
        moreText.style.display = 'none';
    }
});