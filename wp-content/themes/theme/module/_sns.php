<?php
$current_url = get_permalink();
?>
<div class="l-grid">
    <ul class="l-grid-inner">
        <li class="l-grid-item">
            <div class="fb-like" data-href="<?php echo $current_url; ?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </li>
        <li class="l-grid-item">
            <a href="<?php echo $current_url; ?>" class="twitter-share-button" data-lang="ja" data-size="small" data-count="vertical">ツイート</a>
        </li>
        <li class="l-grid-item">
            <div class="g-plusone" data-size="tall"></div>
        </li>
        <li class="l-grid-item">
            <a data-pocket-label="pocket" data-pocket-count="vertical" class="pocket-btn" data-lang="en"></a>
        </li>
        <li class="l-grid-item">
            <a href="<?php echo $current_url; ?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="vertical-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加">
                <img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" />
            </a>
        </li>
    </ul>
</div>