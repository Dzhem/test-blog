<?php
namespace Blog;

use PDO;

class PostMapper
{    
    /**
     * connection
     *
     * @var PDO
     */
    private $connection;
    
    /**
     * __construct
     *
     * @param  PDO $connection
     * @return void
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getByUrlKey(string $urlKey): array
    {
        $statement = $this->connection->prepare('SELECT * FROM post WHERE url_key = :url_key');
        $statement->execute([
            'url_key => $urlKey'
        ]);

        $result = $statement->fetchAll();
        
        return array_shift($result);
    }
}