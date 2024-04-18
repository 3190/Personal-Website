
// 当点击按钮（class为btn的元素）时执行以下代码
$('.btn').click(function () {
  // 切换当前按钮的类名为active，如果已经有active类名则移除，如果没有则添加
  $(this).toggleClass('active');
  // 切换所有class为box的元素的类名为open，如果已经有open类名则移除，如果没有则添加
  $('.boxs').toggleClass('open');
});
//z
