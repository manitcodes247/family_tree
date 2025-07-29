<?php
require 'classes/Database.php';
require 'classes/Member.php';
$db = (new Database())->getConnection();
$member = new Member($db);
$allMembers = $member->getMembers();
echo createTree($allMembers);
?>
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
}

ul{
    list-style-type: disc;
    margin-left: 20px;
    padding-left: 20px;
}

li ul > li{
    list-style-type: circle;
}

#addBtn{
    padding: 8px 16px;
    margin-top: 20px;
    background-color: blue;
    color: #fff;
    border: none;
    border-radius: 0px;
    cursor: pointer;
}

#addBtn:focus{
    outline: none;
}

#addModal{
    display: none;
    position: fixed;
    top: 20%;
    left: 35%;
    width: 30%;
    background: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    z-index: 1000;
}

#addForm input,
#addForm select{
    width: 100%;
    padding:10px;
    margin: 10px 0;
} 

#addForm button{
    padding: 6px;
    width: 40%;
    height: 35px;
    margin-top: 10px;
    color: #fff;
    background-color: #333;
    margin-bottom: 30px;
    border: 1px solid #ccc;
    cursor: pointer;
}

.form-group {
    margin-bottom: 0px;
}

#closeModal{
    float: right;
    cursor: pointer;
    background-color: #000;
    color: #fff;
    border: none;
}
</style>

<button id="addBtn">Add Member</button>
<div id="addModal">
    <span id="closeModal">&times;</span>
        <form id="addForm">
            <div class="form-group">
                <label>Parent:</label>
                <select name="parent">
                    <option value="">-- None (Top Level Parent) --</option>
                    <?php foreach ($allMembers as $m): ?>
                        <option value="<?= $m['Id'] ?>"><?= $m['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" required pattern="[A-Za-z ]+">
            </div>
            <button type="submit">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
function createTree($members, $parentId = null){
    $branch = "<ul>";
    foreach ($members as $member) {
        if($member['ParentId'] == $parentId){
            $branch .= "<li data-id='{$member['Id']}'>{$member['Name']}";
            $branch .= createTree($members, $member['Id']);
            $branch .= "</li>";
        }
    }
    $branch .= "</ul>";
    return $branch;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#addBtn').click(function(){
            $('#addModal').show();
        });

        $('#closeModal').on('click',function(){
            $('#addModal').fadeOut();
        })

        $('#addForm').on('submit',function(e){
            e.preventDefault();
            let name = $('input[name="name"]').val().trim();
            let parent = $('select[name="parent"]').val();

            if(name === ''){
                alert("Name can't be empty!");
                return;
            }

            $.ajax({
                url: 'add_member.php',
                method: 'POST',
                data: {name: name, parent: parent},
                success: function(response){
                    const res = JSON.parse(response);
                    if(res.success){
                        let newLi = '<li data-id="' + res.new_id + '" class="' + (parent === '' ? 'parent' : 'child') + '">' + name + '</li>';

                        if(parent){
                            let parentLi = $('li[data-id="' + parent + '"]');
                            if(parentLi.children("ul").length === 0){
                                parentLi.append('<ul>' + newLi + '</ul>');
                            }else{
                                parentLi.children("ul").append(newLi);
                            }
                        }else{
                            $('ul').first().append(newLi);
                        }

                        $('select[name="parent"]').append('<option value="' + res.new_id + '">' + name + '</option>');
                        $('#addModal').hide();
                        $('#addForm')[0].reset();
                    }else{
                        alert('Failed to add!');
                    }
                }
            });
        });
    });
</script>
</body>
</html>