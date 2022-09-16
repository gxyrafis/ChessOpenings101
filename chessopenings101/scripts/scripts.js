function deleteq(ID)
{
    flag = window.confirm("Are you sure you want to delete the question with id: " + ID);
    if(flag)
        window.location.href="deleteq.php?id=" + ID;
}

function editq(ID)
{
    window.location.href="editquestions.php?id=" + ID;
}

function edituser(username)
{
    window.location.href="edituser.php?usern=" + username;
}
function deleteuser(username)
{
    flag = window.confirm("Are you sure you want to delete user: "+username);
    if(flag)
        window.location.href="deleteuser.php?usern=" + username;
}
function approve(ID)
{
    window.location.href="approveq.php?id=" + ID;
}
function editq(ID)
{
    window.location.href="editquestions.php?id=" + ID;
}