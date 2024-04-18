<?php
/**
 * 文章列表简化模板(made by:风吟酱❤千明酱)
 *
 * @package custom
 */
?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<?php
 $this->widget('Widget_Archive@myCustomCategory', 'type=category', 'mid=1')->to($this);
?>
<div class="col-mb-12 col-8" id="main" role="main">
    <?php while ($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <h2 class="post-title" itemprop="name headline">
                <a itemprop="url"
                   href="<?php $this->permalink() ?>" ><?php $this->title() ?></a>
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

    <?php $this->related(5)->to($relatedPosts); ?>
    <ul>
    <?php while ($relatedPosts->next()): ?>
    <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
    <?php endwhile; ?>
</ul>

</div><!-- end #main-->


