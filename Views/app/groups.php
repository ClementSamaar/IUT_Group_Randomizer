<?php
echo '<h2>Groups</h2>';
echo '<p>' . $content['groupList']->getName() . '</p>';
foreach ($content['groupList']->getList() as $group){
    echo 'Group ' . $group->getId() . '<br>';
    foreach ($group->getList() as $student){
        echo $student->getFName();
        echo ' ' . $student->getLName() . ' ';
        echo PHP_EOL;
    }
    echo '<br>';
}