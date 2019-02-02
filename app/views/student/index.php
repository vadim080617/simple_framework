<div>
    <h3>Students</h3>
    <ul>
    <?php
    foreach($vars['students'] as $student) {
        echo '<li>';
            foreach($student as $field) {
                echo $field . ' ';
            }
        echo '</li>';
    }
    ?>
    </ul>
</div>
