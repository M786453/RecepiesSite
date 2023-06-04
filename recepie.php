<?php
session_start();

// check login status
if(!isset($_SESSION["isLogedIn"])){
    // If user is not logged in, redirect to login page
    redirectLogin();
}

// redirect to login page
function redirectLogin(){
    header("Location: /recepies/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css" />
    <style>
        h1{
            color : black;
            text-transform : uppercase;
            text-align : center;
            letter-spacing : 0.4rem;
        }
        small{
            color : black;
            text-align : center;
            width: 100%;
            display : block;
        }
        p{
            color : black;
            padding : 0 2rem;
        }
        .flex{
            display : flex;
            gap : 1rem;
            padding : 0 2rem;
            margin : 1rem 0;
        }
        div span{
            background-color : black;
            padding : 0.3rem 0.5rem;
            border-radius : 16px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="index.html" style="color: black;">RECIPES</a>
        <div>
            <a href="contact.php" style="background-color: black; color: white;">Contact</a>
            <a href="recepies.php" style="background-color: black; color: white;">Recepies</a>
            <a href="logout.php" style="background-color: black; color: white;">Logout</a>
        </div>
    </nav>
    <?php
        include "connect.php";
        // Create connection with databasse
        $conn = createConnectionToMySql();

        $name = $_GET['name'];

        $sql = "SELECT * FROM recepies WHERE name='$name'";

        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            $row = mysqli_fetch_assoc($result);
            echo "<img src='".$row['img_url']."' alt='' style='width : 100%; max-height : 20rem; object-fit:cover;margin-top:5rem;'>";
            echo "<h1>".$name."</h1>";
            echo "<small>".$row['category']."</small>";
            echo "<p>".$row['description']."</p>";
            echo "<div class='flex'>";
            $ingredients_array = json_decode($row['ingredients'], true);
            foreach($ingredients_array as $ingredient){
                echo "<span>".$ingredient."</span>";
            }
            
            echo "</div>";
        }

    ?>
    <!-- <img src="./assets/food.jpg" alt="" style="width : 100%; max-height : 20rem; object-fit:cover;margin-top:5rem;">
    <h1>Recipe Name</h1>
    <small>( Recipe Type )</small>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium odio minus animi ducimus. Asperiores officiis aliquid vitae, est similique ducimus, quasi praesentium animi expedita dignissimos, sequi maxime? Facilis, accusamus cumque?
    Quae aliquam cum tempora nam dolor rem cumque, velit repellendus! Quo, quibusdam laudantium doloremque omnis, provident minima deserunt ipsum quae harum quaerat consequatur maiores tempore ipsam asperiores quam corrupti cum.
    Ea consectetur ullam natus sequi, deserunt veniam voluptatem adipisci cum incidunt ad mollitia impedit obcaecati nihil officiis saepe, veritatis aperiam. Accusantium minima odio doloremque maxime, suscipit culpa ut nam cupiditate.
    Cupiditate tenetur saepe iusto alias! Excepturi, optio! At delectus illo nobis veniam aut velit saepe, accusantium mollitia numquam quae odit necessitatibus corporis. Error veniam odit, voluptatum omnis repellendus veritatis molestias!
    Minus sunt dicta voluptatibus mollitia deserunt blanditiis, quia rerum odit ut sit voluptate! Iusto tenetur laborum aliquid quas eius qui ratione! Necessitatibus debitis vel quisquam fugit placeat temporibus beatae a?
    Quas adipisci cum, hic in maiores mollitia architecto error minus possimus doloribus, nemo obcaecati illo, aperiam beatae harum cupiditate consequatur ipsa distinctio nulla? Quas eaque odio deserunt numquam nobis temporibus?
    Beatae accusamus minus sit eveniet error itaque eos sint quam asperiores cum commodi obcaecati dolorem quod esse, ipsum ab totam ipsam a molestias et, sequi illum iusto. Dignissimos, molestias doloribus.
    Quia voluptas nostrum maxime porro dolores perferendis quis, molestias vel. Non minima natus a, ipsam quas dolore, voluptatem asperiores recusandae rerum accusantium ducimus ullam distinctio doloremque ipsum similique assumenda obcaecati.
    Nemo vel harum dolore nesciunt, odio assumenda adipisci labore commodi exercitationem aut cumque earum, ratione voluptates esse in quisquam dolores atque ullam, quaerat eligendi similique sit? Corporis alias eaque illo?
    Optio aut modi doloribus eius dicta, voluptatibus rem magni dolore facere aliquam. Autem ex, illo fugiat labore et velit sapiente aliquam. Rerum, corporis tenetur dolore nihil quo vero. Quo, omnis.
    Adipisci fuga aperiam, natus sit qui quae sint molestiae impedit ducimus error cumque eos, maxime dicta. Aliquid laborum eos laudantium cumque quae dolore illo non eligendi, explicabo sunt quam repellat.
    At, dolor magni perspiciatis explicabo illo itaque animi necessitatibus dolores blanditiis reiciendis corporis doloribus omnis hic vitae libero. Quisquam ipsam aliquam in error officiis, magni iusto recusandae vero excepturi deleniti?
    Provident iure sapiente itaque laboriosam libero laudantium amet eius rem vel. Possimus incidunt, illum eveniet enim suscipit veniam vitae dignissimos? Illo dolorem alias libero eius enim dolores excepturi voluptate neque?
    Quidem, consectetur excepturi est repellat porro perferendis explicabo similique. Illum doloribus vitae nihil commodi tenetur repellendus ab! Error temporibus ab praesentium. Illum eveniet accusamus assumenda obcaecati porro laborum consequatur ipsam.
    Nihil dolor dolore, recusandae earum voluptate nostrum alias ullam laboriosam repellat non distinctio itaque, accusantium iure, dignissimos culpa consequatur temporibus vitae odit repellendus. Voluptas delectus totam corrupti aut quae dolores.
    Perspiciatis iste tenetur repellat pariatur veniam inventore nihil temporibus, enim officiis eligendi ea totam reiciendis labore possimus similique eaque at deserunt sit quos eius nobis corporis soluta. Rerum, consectetur voluptatibus.
    Tempora aliquam dolore eos dolor fugiat! Voluptates voluptate, nemo dignissimos vel esse totam debitis eius exercitationem laudantium iusto praesentium pariatur quos ad ut magni culpa saepe est quo deleniti non.
    Perspiciatis ipsam maxime saepe, incidunt quam minima soluta sunt est totam iste harum aut voluptatem error, debitis qui autem unde iure obcaecati illum amet, veritatis alias cupiditate enim accusamus? Optio?
    Pariatur soluta provident perferendis odio suscipit quos illo aspernatur dolor dignissimos inventore fugiat perspiciatis dicta omnis quibusdam accusantium earum ducimus quam optio, tempore nesciunt. Magni deserunt minus accusantium hic sed.</p>
    
    <div class='flex'>
        <span>ingridient</span>
        <span>ingridient</span>
        <span>ingridient</span>
        <span>ingridient</span>
        <span>ingridient</span>
        <span>ingridient</span>
    </div> -->

</body>
</html>