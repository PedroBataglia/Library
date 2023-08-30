<?php
//require_once __DIR__ . './inicio-html.php';
/** @var Book[] $bookList */

use Pedropetretti\Library\Entity\Book;

?>
<header>
    <div>
        <nav>
            <ul>
                <li>
                    <a  href="./new-book">New-Book</a>
                </li>
                    <a href="./filter-book">Filter</a>
            </ul>
        </nav>
    </div>
</header>

<h1>Teste de lista de videos</h1>
<?php foreach($bookList as $book): ?>
    <li>
         <h3><?= $book->name?></h3>
    </li>
<?php endforeach; ?>

