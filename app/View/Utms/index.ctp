<h2>UTM list</h2>
<table>
    <tr>
        <th>Source</th>
        <th>Medium</th>
        <th>Campaign</th>
        <th>Content</th>
        <th>Term</th>
    </tr>
    <?php foreach ($utms as $utm): ?>
        <tr>
            <td><?= h($utm['Utm']['source']); ?></td>
            <td><?= h($utm['Utm']['medium']); ?></td>
            <td><?= h($utm['Utm']['campaign']); ?></td>
            <td><?= isset($utm['Utm']['content']) ? h($utm['Utm']['content']) : "NULL" ?></td>
            <td><?= isset($utm['Utm']['term']) ? h($utm['Utm']['term']) : "NULL" ?></td>
        </tr>
    <?php endforeach; ?>
</table>

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
