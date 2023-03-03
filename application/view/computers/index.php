<div class="container">
    <h1>Computers</h1>
    <h2>You are in the View: application/view/computers/index.php (everything in this box comes from that file)</h2>
    <!-- add computer form -->
    <div class="box">
        <h3>Add a computer</h3>
        <form action="<?php echo URL; ?>computers/addcomputer" method="POST">
            <label>Brand</label>
            <input type="text" name="brand" value="" required />
            <label>Description</label>
            <input type="text" name="description" value="" required />
            <label>Link</label>
            <input type="text" name="link" value="" />
            <input type="submit" name="submit_add_computer" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of computers: <?php echo $amount_of_computers; ?></h3>
        <h3>Amount of computers (via AJAX)</h3>
        <div id="javascript-ajax-result-box"></div>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of computers via Ajax (will be displayed in #javascript-ajax-result-box ABOVE)</button>
        </div>
        <h3>List of computers (data from model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Brand</td>
                <td>Description</td>
                <td>Link</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($computers as $computer) { ?>
                <tr>
                    <td><?php if (isset($computer->id)) echo htmlspecialchars($computer->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($computer->brand)) echo htmlspecialchars($computer->brand, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($computer->description)) echo htmlspecialchars($computer->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php if (isset($computer->link)) { ?>
                            <a href="<?php echo htmlspecialchars($computer->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($computer->link, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo URL . 'computers/deletecomputer/' . htmlspecialchars($computer->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'computers/editcomputer/' . htmlspecialchars($computer->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
