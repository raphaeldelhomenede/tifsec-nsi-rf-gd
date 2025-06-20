<table class="calendar">
<thead>
    <tr>
    <?php foreach ($seances_data3[6][3][0][0][5][0] as $rgh1665) {
        echo "<th>" . htmlspecialchars($rgh1665) . "</th>";
    } ?>
    </tr>
</thead>
<tbody id="calendar-body">
    <?php
    for ($i = 1; $i <= 48; $i++) {
        if (($i - 1) % 3 == 0) echo '<tr>';
        echo "<td>Sujet $i</td>";
        echo "<td><a href='?session=pratique/sujet$i'>Voir le sujet $i</a></td>";
        if ($i % 3 == 0) echo '</tr>';
    }
    if (($i - 1) % 3 != 0) echo '</tr>';
    ?>
</tbody>
</table>
