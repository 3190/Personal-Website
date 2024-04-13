<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 嘀咕
 *
 * @package custom
 */ 
$this->need('public/header.php'); ?>
    	<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/memos/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/memos/css/APlayer.min.css'); ?>">
		<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/memos/css/highlight.github.min.css'); ?>">
		<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/memos/css/custom.css'); ?>">
		<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/memos/css/style.css'); ?>">
		<link rel="icon" href="<?php $this->options->themeUrl('/assets/memos/img/logo.webp' ); ?>"type="image/*">
		<style>

:root {
    /* light theme color */
    --color-main: #222;
    --color-background: #fff;
    --color-text-bg: #eaeaea;
    --color-text-hover: #eeeef1;
    --color-memos-id: #536471;
    --color-img-border: #cfd9de;
    --color-tag: #2563eb;
    --color-tag-hover: #54a3ff;
    --color-fg-muted: #576061;
    --color-border-default: #d0d7de;
    --color-border-muted: #d8dee4;
    --color-post-preview: #fff;
    --color-memos-pre-bg: #f3f4f6;;

    /* variables for js, must be the same as these in @custom-media queries */
    --phoneWidth: (max-width: 684px);
    --tabletWidth: (max-width: 900px);
}

body.dark-theme {
    /* dark theme colors */
    --color-main: #adbac7;
    --color-background: #1c2128;
    --color-text-bg: #22272e;
    --color-text-hover: #272c32;
    --color-memos-id: #71767b;
    --color-img-border: #292a2d;
    --color-tag: #539bf5;
    --color-link: #539bf5;
    --color-border-muted: #2d333b;
    --color-post-preview: #4a4b50;
    --color-memos-pre-bg: #2d333b;
}

@media (prefers-color-scheme: light) {
    body:not(.dark-theme) {
        /* light theme color */
        --color-main: #222;
        --color-background: #fff;
        --color-text-bg: #eaeaea;
        --color-text-hover: #eeeef1;
        --color-memos-id: #536471;
        --color-img-border: #cfd9de;
        --color-tag: #2563eb;
        --color-tag-hover: #54a3ff;
        --color-fg-muted: #576061;
        --color-border-default: #d0d7de;
        --color-border-muted: #d8dee4;
        --color-post-preview: #fff;
        --color-memos-pre-bg: #f3f4f6;
    }
}

@media (prefers-color-scheme: dark) {
    body:not(.light-theme) {
        /* dark theme colors */
        --color-main: #adbac7;
        --color-background: #1c2128;
        --color-text-bg: #22272e;
        --color-text-hover: #272c32;
        --color-memos-id: #71767b;
        --color-img-border: #292a2d;
        --color-tag: #539bf5;
        --color-link: #539bf5;
        --color-border-muted: #2d333b;
        --color-post-preview: #4a4b50;
        --color-memos-pre-bg: #2d333b;
    }
}
blockquote, dl, dd, h1, h2, h3, h4, h5, h6, hr, figure, p, pre {
    margin: 0;
}
body {
    color: var(--color-main);
    background-color: var(--color-background);
    box-sizing: border-box;
    min-width: 200px;
    max-width: 980px;
    margin: 0 auto;
    padding: 45px;
}
.menu {
    display: flex;
    align-items: center;
    font-size: 1.5rem;
    margin: 0;
}

.title {
    font-size: 1.5rem;
}

.pages a {
    color: var(--color-main);
    text-decoration: none;
    margin-left: 1rem;
}

.pages a:hover {
    text-decoration: underline;
}

h1 {
    margin-bottom: 16px;
    font-weight: 600;
    line-height: 1.25;
    margin: .67em 0;
    margin-top: 0.67em;
    margin-bottom: 0.67em;
    font-weight: 600;
    padding-bottom: .3em;
    font-size: 2em;
    border-bottom: 1px solid var(--color-border-muted);
}

blockquote {
    margin: 1em 0;
    padding: 0 1em;
    color: var(--color-fg-muted);
    border-left: 0.25em solid var(--color-border-default);
}

#main {
    padding-top: 40px;
}

.theme-toggle {
    cursor: pointer;
}

.total {
    text-align: left;
}

.memos {
    min-height: 300px;
    text-align: left;
    width: 100%;
    line-height: 2;
    margin: 2rem 0;
}

.memos a {
    color: var(--color-link);
    text-decoration: none;
}

.memos a:hover {
    text-decoration: underline;
}

.memos ul {
    margin-left: 0 !important;
    padding-left: 0 !important;
}

.memos__content {
    flex-grow: 1;
    margin-left: 50px;
    position: relative;
    max-width: 100%;
    width: 100%;
}

.memos__content:before {
    content: '';
    position: absolute;
    background: url('https://blog.nonly.cn/usr/themes/Island/assets/memos/img/avatar.jpg') no-repeat;
    background-size: contain;
    width: 40px;
    height: 40px;
    border-radius: 40px;
    left: -50px;
    top: 10px;
    border: 0;
    object-fit: cover;
}

.memos__text {
    position: relative;
    background: var(--color-text-bg);
    padding: 1rem;
    border-radius: 0.5rem;
    font-size: 1rem;
}

.timeline {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    margin-bottom: 1.5rem;
}

.timeline:hover .memos__text:before {
    background: var(--color-text-hover);
    z-index: 1;
}

.timeline:hover .memos__text {
    background: var(--color-text-hover);
}

.memos__text {
    width: 100%;
    overflow-wrap: break-word;
    font-size: 1rem;
    line-height: 1.75rem;
}

.memos__text ul li {
    list-style: none;
}

.memos__text i {
    margin: 0 0.25rem;
}

.memos__text:before {
    content: "";
    position: absolute;
    top: 23px;
    left: -7px;
    width: 14px;
    height: 14px;
    transform: rotate(45deg);
    border-radius: 3px;
    background: var(--color-text-bg);
    z-index: 1;
}

.memos__text pre {
    margin-top: 0.25rem;
    margin-bottom: 0.25rem;
    max-width: 100%;
    white-space: pre-wrap;
    border-radius: 0.25rem;
    background-color: var(--color-memos-pre-bg);
    padding: 0.75rem;
}

.memos__text code {
    display: inline-block;
    border-radius: 0.25rem;
    background-color: var(--color-memos-pre-bg);
    padding-left: 0.25rem;
    padding-right: 0.25rem;
    font-family: ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;
    font-size: .875rem;
    line-height: 1.5rem;
}

.memos__text pre code {
    display: block;
}

.memos__meta {
    margin: 0;
}

.memos__meta small {
    font-size: 0.8rem;
    font-weight: 500;
    color: #8186a2;
}

.memos__userinfo {
    display: flex;
    font-weight: 700;
    align-items: center;
}

.memos__verify {
    margin-left: 2px;
    max-width: 20px;
    max-height: 20px;
    color: #1d9bf0;
    -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    vertical-align: text-bottom;
    position: relative;
    height: 1.25rem;
    fill: currentcolor;
    display: inline-block;
    flex-shrink: 1;
    margin-left: 4px;
}

.memos__id {
    font-size: 0.875rem;
    overflow-wrap: break-word;
    min-width: 0px;
    box-sizing: border-box;
    color: var(--color-memos-id);
    display: inline;
    white-space: pre-wrap;
    word-wrap: break-word;
    flex-shrink: 1;
    font-weight: 400;
    margin-left: 4px;
}

.resource-wrapper {
    display: flex;
    width: 100%;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
}

.images-wrapper {
    margin-top: 0.5rem;
    display: grid;
    width: 100%;
    grid-template-columns: repeat(2,minmax(0,1fr));
    gap: 0.5rem;
}

@media (min-width: 640px) {
    .images-wrapper {
        grid-template-columns:repeat(3,minmax(0,1fr));
    }
}

.resimg {
    width: 100%;
    overflow: hidden;
    border-radius: 0.25rem;
    --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
    --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow);
    -ms-overflow-style: none;
    scrollbar-width: none;
    height: 202px;
}

.timeline img, .resimg img {
    display: block;
    vertical-align: middle;
    max-width: 100%;
    height: auto;
    min-height: 100%;
    width: auto;
    min-width: 100%;
    cursor: pointer;
    -o-object-fit: cover;
    object-fit: cover;
}

.tag-span {
    color: var(--color-tag);
}

.tag-span:hover {
    color: var(--color-tag-hover);
}

.load-btn {
    color: var(--color-main);
    background-color: var(--color-text-bg);
    margin-left: 50px;
    border-radius: 8px;
    padding: 10px;
    border: none;
}

.load-btn:hover {
    background-color: var(--color-text-hover);
}

.post-preview {
    max-width: 780px;
    height: 210px;
    margin: 1em auto;
    position: relative;
    display: flex;
    background: var(--color-post-preview);
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .25);
}

.post-preview--meta {
    width: 75%;
    padding: 25px;
    overflow: hidden;
}

.post-preview--middle {
    line-height: 28px;
}

.post-preview--title {
    font-size: 18px;
    margin: 0 !important;
}

.post-preview--title a {
    text-decoration: none;
}

.post-preview--date {
    font-size: 14px;
    color: #999;
}

.post-preview--excerpt {
    font-size: 14px;
    line-height: 1.825;
}

.post-preview--excerpt p {
    display: inline;
    margin: 0;
}

.post-preview section {
    max-height: 75px;
    overflow: hidden;
}

.post-preview--image {
    margin: 0 !important;
    height: 210px !important;
    width: auto;
    float: right;
    border-radius: 0 !important;
    border-top-right-radius: 2px !important;
    border-bottom-right-radius: 2px !important;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}


.rating {
    display: block;
    line-height: 15px;
}

.rating-star {
    display: inline-block;
    width: 75px;
    height: 15px;
    background-repeat: no-repeat;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAAClCAYAAAAUAAAYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA5xJREFUeNrs3T9rFEEcxvG7qEQIglaCICKkin9AUEtBKxU7wS61VlYivgWj70TtNFj5BqzE7qxEWwsxKIoYn4UtluFmbm8nczvzm+/BjxyuDwNzu3uXD0+46f7LC5PA45Hm+WTYw1x2LRDc0jzTXB+wqMlsaLPutz8fDFjYZHYauAz3NBvt83XNnyUWNpn1nVm3OsHmsb3EomazzZnVXKMPNcc0xzUnNKc0Rzv/77fms+Z7O3vt9b1eU7bZrNN68l5zcolX4ofmsuZXTdnmMvyi2dR86Bmcac62P6vKrnVubpc0bxYE32nOab45N8YqsvPeDfcD4SOav4HjprPuu+H5BTt9LXDMfNbdLPfT678Fx6vKupt1o/O8+R3pkOaJ5/iktqx7z/qp+aq5q/nY+fczmheaK03Gs7D5rLtZdzSvA6/Ebc2u55j57HQB0TzW7AzkjiKzny6+2hlKNE8juMNcFqKBaIZndRlCNBBNgmx7ZkE0fbLtZkE0EA1EM17WuQwhGogGooFoss6296y52cNO+J6HLJoPaFdbsvA9zGerIxrPh85eWYgGooFoDiQbuAxp0UA0EVmdWbRo+ma1WbRoIBqIZtzsnHdDWjQQDUQD0WSbde5ZS2UhmtqJJtSEiVkXooFoIJre2VATJmZdiKZ2ogk1YSb8oVMvDeUPnSAaiCaPJkzMuhANRAPRQDQpsqEmTMy6EI11oolpwkA0EA1EcyDZmCYMRAPR+LMxTZjqiCamCQPRQDQQzehNGIgGooFoIJpVZ2OaMBBN7USTqgkD0UA0EE3vbKomDERTO9GkasKYJJpUTRiIBqKBaEZvwkA0EA1EA9GkyKZqwkA01olmrCYMRAPRQDR9LkO+0QmiKbAJUyTRjNWEgWggGohm9CYMRAPRQDQQzZDsWE0YiMYC0eTYhIFoIJrKiCbHJgxEY4FocmzCZEs0OTZhIBqIpjKiybEJA9FANBANROPL5tiEgWhKIJoSmzAQDURjjGhKbMJANCUQTYlNmNGIpsQmDEQD0RgjmhKbMBANRAPR1Es0JTZhIJpciMZaEwaigWgKJBprTRiIJheisdaESUo01powEA1EUyDRWGvCQDQQDURjm2isNWEgmlURzWw2q4pZIBqIJkOiCVyGJpkFolkV0ejMMvel28mIRptl7ku3IRqIpjCimfNuaJpZIBqIBqIpm2ice5Z5ZonJupvVkMRu4JW4qXnrOWY++1+AAQBw9BJSCTeN9wAAAABJRU5ErkJggg==);
    overflow: hidden;
}

.allstar10 {
    background-position: 0px 0px;
}

.allstar9 {
    background-position: 0px -15px;
}

.allstar8 {
    background-position: 0px -30px;
}

.allstar7 {
    background-position: 0px -45px;
}

.allstar6 {
    background-position: 0px -60px;
}

.allstar5 {
    background-position: 0px -75px;
}

.allstar4 {
    background-position: 0px -90px;
}

.allstar3 {
    background-position: 0px -105px;
}

.allstar2 {
    background-position: 0px -120px;
}

.allstar1 {
    background-position: 0px -135px;
}

.allstar0 {
    background-position: 0px -150px;
}

.rating-average {
    color: #777;
    display: inline-block;
    font-size: 13px;
    margin-left: 10px;
}

.spotify-wrapper>iframe {
    position: relative;
    height: 152px;
}

@media (max-width: 683px) {

    body {
        padding: 45px 50px 45px 20px;
    }

    .menu,
    .title {
        font-size: 1rem;
    }

    .memos__content {
        margin-left: 0;
    }

    .memos__text:before {
        display: none;
    }

    .memos__userinfo {
        margin-left: 30px;
    }

    .memos__content:before {
        border-radius: 25px;
        height: 25px;
        width: 25px;
        left: 15px;
        top: 15px;
        z-index: 2;
    }

    .load-btn {
        margin-left: 0;
    }

    .timeline ul li {
        margin-left: 0;
    }

    .timeline ul li div {
        width: calc(100vw - 75px);
        left: 30px;
        max-width: 585px;
    }

    .post-preview {
        width: 95%;
    }

    .post-preview--excerpt {
        display: none;
    }

    .post-preview--middle {
        line-height: 19px;
    }

    .load-btn {
        margin-left: 0;
    }
}

.video-wrapper {
    height: 0;
    overflow: hidden;
    padding-bottom: 56.25%;
    position: relative;
    width: 100%;
}

.video-wrapper iframe {
    border: 0;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
}

footer {
    padding: 40px 0;
    text-align: center;
}

.hidden {
    display: none !important;
}

.filter{
	display:none;
}
	</style>
	<style>
@font-face {
    font-family: CustomFont;
    src: url(<?php CustomFont_url();?>);
    }
body {
    font-family: CustomFont, serif;
    }
<?php $this->options->CustomStyle(); ?>
</style>
			<div class="menu">
		<section id="main" class="container">
			<center><h1>嘀咕</h1></center>
            <blockquote>
                <div class="biaoqian">共嘀咕了 <span id="total">0</span> 条 <a href="https://memos.nonly.cn/" target="_blank" rel="noreferrer noopener nofollow">Memos</a> <span class="emoji">🎉</span></div>
            </blockquote>
            <blockquote id="tag-filter" class="filter">
				<div id="tags"></div>
			</blockquote>
			<div id="memos" class="memos">
				<!-- Memos Container -->
			</div>
		</section></div><?php $this->need('public/comments.php'); ?>
		<!-- Your Memos API -->
		<script type="text/javascript">
        var memos = {
            host: 'https://memos.nonly.cn/',  //修改为自己部署 Memos 的网址，末尾有 / 斜杠
            limit: '10',  //默认每次显示 10条
            creatorId: '1',  //默认为 101用户 https://demo.usememos.com/u/101
            domId: '#memos',  //默认为 #memos
            username: 'admin',  //发布者 ID 自定义
            name: '1nonly',  //发布者全称自定义
        }
		</script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/lazyload.min.js?v=17.8.3'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/marked.min.js?v=4.2.2'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/view-image.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/moment.min.js?v=2.29.4'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/moment.twitter.js'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/APlayer.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/Meting.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/highlight.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/main.js'); ?>" type="text/javascript"></script>
		<script src="<?php $this->options->themeUrl('assets/memos/js/custom.js'); ?>" type="text/javascript"></script>
		<script>
			hljs.highlightAll();
		</script>
