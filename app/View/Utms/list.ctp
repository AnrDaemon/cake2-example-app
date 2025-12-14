<h2>UTM statistics</h2>
<?php
$data = [];
foreach ($utms as $utm) {
    $content = isset($utm['Utm']['content']) ? $utm['Utm']['content'] : "NULL";
    if (!isset(
        $data[$utm['Utm']['source']],
        $data[$utm['Utm']['source']][$utm['Utm']['medium']],
        $data[$utm['Utm']['source']][$utm['Utm']['medium']][$utm['Utm']['campaign']],
        $data[$utm['Utm']['source']][$utm['Utm']['medium']][$utm['Utm']['campaign']][$content]
    )) {
        $data[$utm['Utm']['source']][$utm['Utm']['medium']][$utm['Utm']['campaign']][$content] = [];
    }

    $data[$utm['Utm']['source']][$utm['Utm']['medium']][$utm['Utm']['campaign']][$content][] = isset($utm['Utm']['term']) ? $utm['Utm']['term'] : "NULL";
}
?>
<style type="text/css">
    ul {
        list-style-type: none;
    }
</style>
<ul>
    <?php foreach ($data as $source => $s): ?>
        <li><?= h($source) ?>
            <ul>
                <?php foreach ($s as $medium => $m): ?>
                    <li><?= h($medium) ?>
                        <ul>
                            <?php foreach ($m as $campaign => $c): ?>
                                <li><?= h($campaign) ?>
                                    <ul>
                                        <?php foreach ($c as $content => $t): ?>
                                            <li><?= h($content) ?>
                                                <ul>
                                                    <?php foreach (array_unique($t) as $term): ?>
                                                        <li><?= h($term) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

<div>&nbsp;</div>

<div class="pagination">
    <?= $this->Paginator->prev('<< Prev', array('tag' => 'span', 'class' => 'prev'), null, array('tag' => 'span', 'class' => 'disabled prev')); ?>
    <?= $this->Paginator->numbers(array('tag' => 'span', 'separator' => ' ', 'currentClass' => 'active')); ?>
    <?= $this->Paginator->next('Next >>', array('tag' => 'span', 'class' => 'next'), null, array('tag' => 'span', 'class' => 'disabled next')); ?>
</div>

<p>
    <?php echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, shown {:current} records from {:count}')
    )); ?>
</p>
