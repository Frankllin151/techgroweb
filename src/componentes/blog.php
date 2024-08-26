 <!---Blog -->
 <?php 
 require __DIR__."/../daomysql/daoBlog.php";
 $blog  = new Blogmysql($pdo);

 $posts = $blog->findAll();
 ?>
 <section id="blog">

   <div class="container-blog">
     <div class="title-content-blog">
       <h3>Um pouco de conhecimento</h3>
     </div>
     <div class="carousel">
       <div class="carousel-inner">
         <?php
    $isFirst = true; // Variável para marcar o primeiro item como "active"
    foreach ($posts as $post) {
        $title = $post->getTitle(); // Método para obter o título do post
        $id = $post->getId(); // Método para obter o ID do post
        $activeClass = $isFirst ? 'active' : ''; // Adiciona a classe "active" apenas ao primeiro item
        ?>
         <div class="carousel-item <?php echo $activeClass; ?>">
           <a href="blog.php?id=<?php echo $id; ?>" class="card-blog">
             <h4 class="title-blog"><?php echo htmlspecialchars($title); ?></h4>
             <span class="click-span-blog">Ler blog <i class="bi bi-box-arrow-right"></i></span>
           </a>
         </div>
         <?php
        $isFirst = false; // Após o primeiro item, definir como false para que os próximos itens não sejam "active"
    }
    ?>
       </div>
       <button class="carousel-control-prev"><i class="bi bi-arrow-left"></i></button>
       <button class="carousel-control-next"><i class="bi bi-arrow-right"></i></button>
     </div>

   </div>
 </section>
 <!--blog end-->