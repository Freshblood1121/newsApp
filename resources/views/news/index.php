<?php foreach($news as $n):?>
    <div style="border: 1px solid green">
        <h2><?php echo $n['title']?></h2>
        <p><?php echo $n['description']?></p>
        <div>
            <strong><?php echo $n['author']?>(<?php echo $n['created_at']?>)</strong>
            <a href="<?=route('news.show', ['id' => $n['id']])?>">Далее</a>
        </div>
    </div>
<?php endforeach;?>
