<?php
echo '
<h2>Create a group</h2>
<form method="post" enctype="multipart/form-data" action="index.php?ctrl=groupMaker&action=makeGroups">
    <label for="groupName">Group name</label>
    <input type="text" name="groupName" id="groupName" placeholder="Ex : Projet PHP">
    <label for="maxStud">Students per group*</label>
    <input type="number" name="studPerGroup" id="studPerGroup" min="2" max="15" step="1" required>
    <label for="sourceFile">Student list*</label>
    <input type="file" name="sourceFile" id="sourceFile" required>';
if (isset($content['jsonError'])) echo $content['jsonError'];
echo '<input type="submit" name="submitForm" id="submitForm" value="submit">
</form>
<small>The \'*\' marked fields are required</small>';