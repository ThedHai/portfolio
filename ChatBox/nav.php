
         <!-- Navigation Bar-->
    <nav class="navbar navbar-expand-lg  navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand text-dark">QuickChat</a>

            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navmenue"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            

            <div class="collapse navbar-collapse" id="navmenue">
                <ul class="navbar-nav ms-auto text-dark " >
                    <li class="nav-item" >
                        <a href="./home.php" class="nav-link" ><i class="bi bi-house-door-fill text-dark"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#notifications" class="nav-link" ><i class="bi bi-bell-fill text-dark"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#messages" class="nav-link" ><i class="bi bi-chat-fill text-dark"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="./profile.php" class="nav-link" ><i class="bi bi-person-fill text-dark"></i></a>
                    </li>
                    <li class="nav-item" style="float: right;">
                        <form action="log_out.php"  method="POST">
                            <button  class="btn text-muted border border-secondary" style="float: right;"><i class="bi bi-box-arrow-right"></i> Log out</button>
                        </form>
                    </li>
                    

                </ul>
            </div>
        </div>
    </nav>
