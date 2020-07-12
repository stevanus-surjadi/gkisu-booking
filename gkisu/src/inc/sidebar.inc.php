<li class="nav-item has-treeview menu-open" id="registration">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-book"></i>
        <p>
        Registration
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item " id="userRegistration">
            <a href="/usrRegisterLogin" class="nav-link">
                <i class="fas fa-genderless nav-icon"></i>
                <p>User Registration</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview menu-open" id="setup">
    <a href="#" class="nav-link active">
        <i class="nav-icon fa fa-cogs"></i>
        <p>
        Setup
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item" id="setupSermonSchedule">
            <a href="/sermonSchedule" class="nav-link">
                <i class="fas fa-genderless nav-icon"></i>
                <p>Sermon Schedule</p>
            </a>
        </li>
    </ul> 
</li>

<li class="nav-item has-treeview menu-open" id="validation">
    <a href="#" class="nav-link active">
        <i class="nav-icon fab fa-battle-net"></i>
        <p>
        Validation
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item" id="bookValidation">
            <a href="/bookValidation" class="nav-link">
                <i class="fas fa-genderless nav-icon"></i>
                <p>Booking Validation</p>
            </a>
        </li>
    </ul>
</li>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script>

var myj=jQuery.noConflict();

myj(document).ready(function(){
    //set active menu
    var url = window.location.href;
    var arr = url.split('/');

    //set all root menu collapsed
    //myj('#registration').removeClass('active menu-open');
    //myj('#validation').removeClass('active menu-open');

    //set all menu to no-active
    //myj('#userRegistration').removeClass('active');
    //myj('#AssetMenu').removeClass('active');
 
    
    let web = arr[arr.length-1].toString();
    //console.log(web);
    //set menu active
    if(web === "usrRegister")
    {
        myj('#registration').addClass('active menu-open');
        myj('#usrRegistration > a').addClass('active');
    }

    if(web === "sermonSchedule")
    {
        myj('#setup').addClass('active menu-open');
        myj('#setupSermonSchedule > a').addClass('active');
    }

    if(web === "bookValidation")
    {
        myj('#validation').addClass('active menu-open');
        myj('#bookValidation > a').addClass('active');
    }

    //===========================================
    //
    
    
})
  
</script>