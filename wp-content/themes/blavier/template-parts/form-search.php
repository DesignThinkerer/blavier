<?php 

function select($options,$name,$caption){
    echo "<label><select name='$name'>";
    echo "<option value='' disabled selected>$caption</option>";
    foreach ($options as $value => $label) {
        echo "<option value='$value'>$label</option>";
    }
    echo "</select></label>";
}

$selectFields = [
    [
        'name' => 'price',
        'label' => 'Tranche de prix',
        'options' => [
            "0-100000" => "0 - 100.000€",
            "100000-200000" => "100.000 - 200.000€",
            "200000-300000" => "200.000 - 300.000€",
            "300000-400000" => "300.000 - 400.000€",
            "400000-500000" => "400.000 - 500.000€",
            "500000+" => "500.000€+",
        ]
    ],
    [
        'name' => 'rooms',
        'label' => 'Nombre de chambres',
        'options' => [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5+",
        ]
    ],
    [
        'name' => 'bathrooms',
        'label' => 'Nombre de sdb',
        'options' => [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5+",
        ]
    ],
    [
        'name' => 'type',
        'label' => 'Type de maison',
        'options' => [
            "2-3" => "2 et 3 façades",
            "4" => "4 façades",
        ]
    ]
];
?>
<search>
    <form>
        <?php 
        foreach ($selectFields as $selectField) {
            select(
                $selectField['options'],
                $selectField['name'],
                $selectField['label']
            );
        }
        ?>
        <fieldset>
            <input type="search" id="q" name="q" placeholder="Chercher un modèle">
            <button type="submit">OK</button>
        </fieldset>
    </form>
</search>