<?php
/**
 * Default theme for Typecho
 *
 * @package Typecho Replica Theme
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
// $this->need('header.php');
?>

<?php
if(isset($_GET['list'])){
    while ($this->next()): ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
        <!-- <div style="display=flex;align=center;justify-content:center"> -->
        <article class="post" itemscope itemtype="https://schema.org/BlogPosting">
            <h2 class="post-title" itemprop="name headline">
                <a itemprop="url"
                   href="<?php $this->permalink() ?>" target="_blank"><?php $this->title() ?></a>
            </h2>
            <ul class="post-meta">
                <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a
                        itemprop="name" href="<?php $this->author->permalink(); ?>"
                        rel="author"><?php $this->author(); ?></a></li>
                <li><?php _e('时间: '); ?>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                </li>
                <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                <li itemprop="interactionCount">
                    <a itemprop="discussionUrl"
                       href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
                </li>
            </ul>
            <div class="post-content" itemprop="articleBody">
                <?php
                ob_start();
                $this->content('- 阅读剩余部分 -');
                $content = ob_get_clean();
                $dom = new DOMDocument;
                libxml_use_internal_errors(true);
                $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
                libxml_clear_errors();
                $paragraphs = $dom->getElementsByTagName('p');
                if ($paragraphs->length > 0) {
                    $firstParagraph = $dom->saveHTML($paragraphs->item(0));
                    echo $firstParagraph;
                } else {
                    echo $content;
                }
                ?>
            </div>
        </article>
        <!-- </div> -->
    <?php endwhile;

exit;
}
?>




<?php $this->need('header.php'); ?>
<div class="col-mb-12 col-8" id="main" role="main">
    <?php while ($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <h2 class="post-title" itemprop="name headline">
                <a itemprop="url"
                   href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h2>
            <ul class="post-meta">
                <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a
                        itemprop="name" href="<?php $this->author->permalink(); ?>"
                        rel="author"><?php $this->author(); ?></a></li>
                <li><?php _e('时间: '); ?>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                </li>
                <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                <li itemprop="interactionCount">
                    <a itemprop="discussionUrl"
                       href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
                </li>
            </ul>
            <div class="post-content" itemprop="articleBody">
                <?php $this->content('- 阅读剩余部分 -'); ?>
            </div>
        </article>
    <?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
