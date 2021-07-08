# Symfony Normalizer Enum Type

---

## Read the enum php doc:

> https://github.com/Neutron-Pro/enum-php

---

## Installation

```
composer require neutronstars/symfony-normalizer-enum-php
```

### Add doctrine:

```
composer require neutronstars/doctrine-enum-php-type
```

> https://github.com/Neutron-Pro/doctrine-enum-php-type

---

### Example for serialize an object entity with an enum field:

```php
/**
 * @method static self WAITING()
 * @method static self PUBLISHED()
 */
class MyStringEnum extends \NeutronStars\Enum\Enum {
  public const WAITING   = 'Waiting';
  public const PUBLISHED = 'Published';
}

/**
 * @Entity()
 */
class Post {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer") 
     * @Groups(["post:details"]) 
     * @var int 
     */
     private $id;
     
     // ... Other field (name, createdAt, updatedAt etc..)
     
     /**
      * For the customs type, please check the doctrine enum type documentation.
      * @ORM\Column(type="my_string_enum")
     *  @Groups(["post:details"]) 
      * @var MyStringEnum 
      */
      private $state;
      
      public function __construct() {
        $this->state = MyStringEnum::WAITING();
      }
      
      // ... All methods implemented.
}

/**
 * @Route("/posts", name="list_post")
 */
class ListPostController {

    /** @var PostRepository PostRepository */
    private $postRepository;
    
    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function __invoke(): JSONResponse
    {
        $serializer = new \Symfony\Component\Serializer\Serializer([
            new \NeutronStars\Symfony\Enum\Normalizer\EnumNormalizer(MyStringEnum::class)
        ], [new \Symfony\Component\Serializer\Encoder\JsonEncode()]);
        
        return new JSONResponse(
            $serializer->normalize(
                $this->postRepository->findAll(),
                null,
                [ 'groups' => ['post:details'] ] 
            )
        );
    }
}

```