if(check all old data for blank entry) {

if(blank entry found) {
echo("Display Error Message");

} else {
// if Dep2 and Pic2 is Active,
if(!empty(dep2) && (!empty(pic2))) {
echo("Check for picture existence and use new Department");

// if Dep2 and Pic2 is Blank
} elseif(empty(dep2) && empty(pic2)) {
echo("Retain Old Data");

// If Dep2 is Active and Pic2 is Blank
} elseif(!empty(dep2) && empty(pic2)) {
echo ("Retain Old Data but use new Department");

// if Dep2 is Blank and Pic2 is Active
} elseif(empty(dep2) && !empty($pic2)) {
echo("Check for Picture existence and retain old department");
}
}
}

if (dep2=='---' && pic2=='') {

USE OLD DEPARTMENT AND PICTURE

} elseif(empty(dep2) && (!empty(pic2)) {

Check for PICTURE existence

} elseif (!empty(dep2) && (empty(pic2)) {
USE NEW DEPARTMENT and USE OLD PICTURE
} elseif(!empty(dep2) && !empty(pic2)) {
USE NEW DEPT AND PIC
}