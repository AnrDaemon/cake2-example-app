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
