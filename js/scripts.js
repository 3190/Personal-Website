
//gulp.task('default', gulp.series('build'));
//$('.navTrigger').click(function () {
//  $(this).toggleClass('active');
//  console.log("Clicked menu");
//  $("#mainListDiv").toggleClass("show_list");
//  $("#mainListDiv").fadeIn();

//});
// 滚动效果 js

// 动画播放时间
const animationTime = 500;

// 获取画布
const container = document.querySelector('.container2');

// 获取侧边栏按钮
const lis = document.querySelectorAll('.controls li');

// 网页窗口宽度
let viewWidth = null;

// 网页窗口高度
let viewHeight = null;

// 屏幕索引
let index = 0;

// 检测是否在滚动
let roll = false;

// 鼠标滚动事件
const mousewheel = (e) => {
  // 判断是否在滚动
  if (!roll) {
    roll = true;

    // 获取滚动条的垂直位置
    const element = document.getElementById("roll");
    let y = element.scrollTop;

    console.log(y);
    // 判断向上滚动还是向下滚动
    if (e.wheelDelta > 0 && index > 0 && y == 0) {
      // 向上滚动
      index--;

      // 滚动屏幕
      rollScenes();

      //导航栏移除效果
      document.getElementById('add').classList.remove("affix");

    } else if (e.wheelDelta < 0 && index ==0) {
      // 向下滚动
      index++;

      // 滚动屏幕
      rollScenes();

      //导航栏增加效果
      document.getElementById('add').classList.add("affix");
    }else{
      //重置判断标志，准备进行下一次滚动判断
      roll = false;
    }

  }
}

// 添加鼠标滚动监听
document.addEventListener('mousewheel', mousewheel);

// 滚动视图
const rollScenes = () => {

  // 获取屏幕宽度
  viewWidth = document.body.clientWidth;

  // 获取屏幕高度
  viewHeight = document.body.clientHeight;

  // 添加动画
  container.classList.add("container-animation");

  // 更改位置
  container.style.top = -index * viewHeight + 'px';

  // 更改侧边栏样式
  //changeLocation(index);
  const btn = document.querySelector('.btn');
  if (index === 0) {
    $('.btn').addClass('out');
  } else {
    btn.style.display = 'block';
    $('.btn').removeClass('out');
    $('.btn').removeClass('active');
  }

  const boxs = document.querySelector('.boxs');
  if (index === 0) {
    $('.boxs').removeClass('open');
  } else {
    boxs.style.display = 'block';
  }
  // 更改状态
  setTimeout(function () {
    roll = false;
    container.classList.remove("container-animation");
  }, animationTime);
};
/*
//绑定点击事件
for (let i = 0; i < lis.length; i++) {
  // 给每个 li 添加点击事件
  lis[i].onclick = function () {

    // 判断是否在滚动
    if (!roll) {
      roll = true;
      // 这里的 index 等于 li 的下标
      index = i;
      rollScenes();
    }
  }
}

//改变li的样式
function changeLocation(index) {
  for (var j = 0; j < lis.length; j++) {
    lis[j].className = '';
  }
  lis[index].className = 'active';
}
*/
// 窗体改动事件
const getWindowInfo = () => {
  // 获取屏幕宽度
  viewWidth = document.body.clientWidth;

  // 获取屏幕高度
  viewHeight = document.body.clientHeight;

  // 更改位置
  container.style.top = -index * viewHeight + 'px';

  // 屏幕块
  const section = document.querySelectorAll(".section");

  // 设置样式
  for (let i = 0; i < section.length; i++) {
    section[i].setAttribute("style", "width: " + document.body.clientWidth + "px; height: " + document.body.clientHeight + "px");
  }
};

// 添加窗体改动事件
window.addEventListener('resize', getWindowInfo);

function fadeIn(){

}
