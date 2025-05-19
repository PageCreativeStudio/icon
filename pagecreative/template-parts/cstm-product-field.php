<?php 
    function custom_product_fields_shortcode() {
    global $product;
    if (!$product) {
        $product = wc_get_product(get_the_ID());
    }
	$product_id = $product ? $product->get_id() : 0;

    ob_start();
    ?>
    <div class="custom-product-fields">
        <form id="quote-form" method="post" enctype="multipart/form-data">
            <?php
            // Get product attributes
            $attributes = $product->get_attributes();
            $get_attribute_values = function($attribute_name) use ($attributes) {
                $attribute_name = sanitize_title($attribute_name);
                if (isset($attributes[$attribute_name]) && !empty($attributes[$attribute_name]['value'])) {
                    return array_map('trim', explode('|', $attributes[$attribute_name]['value']));
                }
                return [];
            };

            // Colors
            $colors = $get_attribute_values('Colours');
           // $colors = !empty($colors) ? $colors : ['Black', 'White', 'Navy'];
            $color_map = [
    'Airforce Blue' => '#547485',
    'Airforce Blue' => '#485773',
    'Alien Green' => '#A6DB7C',
    'Almond' => '#DDD7C9',
    'Aloe' => '#9EACA2',
    'Anthracite' => '#585858',
    'Antique Cherry Red' => '#802139',
    'Antique Grey' => '#4F4D50',
    'Antique Sapphire' => '#3F88AF',
    'Apple Green' => '#BCD8B8',
    'Aqua Blue' => '#00bee8',
    'Aquamarine' => '#A2C6D0',
    'Arctic Blue' => '#4276A8',
    'Arctic White' => '#F5F5F5',
    'Army' => '#4D4A38',
    'Ash' => '#85898F',
    'Ash' => '#EAEAEA',
    'Ash' => '#E4E4E8',
    'Ash Black' => '#1A1C1F',
    'Athletic Heather' => '#A4A4A2',
    'Atlantic' => '#26525A',
    'Atlantic Blue' => '#62A8BF',
    'Autumn' => '#B04B32',
    'Azalea' => '#D89FC3',
    'Azure' => '#3C87CC',
    'Baby Pink' => '#EBD6E1',
    'Berry' => '#824754',
    'Black' => '#000000',
    'Black' => '#161616',
    'Black' => '#2E2E2E',
    'Black' => '#242424',
    'Black' => '#302F33',
    'Black' => '#343738',
    'Black Heather Blue' => '#273144',
    'Black Smoke' => '#393339',
    'Blue Soul' => '#B4D0EC',
    'Blush' => '#D6A09A',
    'Bone' => '#C9C1B0',
    'Bone' => '#CABEB2',
    'Bottle Green' => '#335446',
    'Bottle Green' => '#26522', // Note: Invalid hex value from source
    'Bottle Green' => '#092E20',
    'Bottle Green' => '#3B5140',
    'Bottle Green' => '#42514A',
    'Bottle Green' => '#1F4740',
    'Brick Red' => '#923B45',
    'Bright Blue' => '#224E7B',
    'Bright Blue' => '#4E719F',
    'Bright Orange' => '#EB7D39',
    'Bright Pink' => '#C13459',
    'Bright Red' => '#932A27',
    'Bright Red' => '#B62F2B',
    'Bright Royal' => '#3859A1',
    'Bright Royal' => '#40568F',
    'Bright Royal' => '#314B90',
    'British Khaki' => '#534A32',
    'Bubble Pink' => '#e993b8',
    'Bubblegum' => '#E0A6B1',
    'Burgundy' => '#6A2E3E',
    'Burgundy' => '#593134',
    'Burgundy' => '#3D101A',
    'Burgundy' => '#4B2325',
    'Burgundy' => '#67232F',
    'Burgundy' => '#633D4C',
    'Burgundy' => '#6E2C36',
    'Burgundy Smoke' => '#5E2739',
    'Burnt Orange' => '#C8553C',
    'Butter' => '#F5EEC9',
    'Butter' => '#F3F0D9',
    'Buttercup Yellow' => '#FCF191',
    'Camel' => '#9F7C49',
    'Candy Pink' => '#C8B3BC',
    'Candy Pink' => '#F5EAE5',
    'Candyfloss Pink' => '#E491C3',
    'Canyon Pink' => '#D3979C',
    'Caramel' => '#946843',
    'Caramel Latte' => '#BD916A',
    'Caramel Toffee' => '#684932',
    'Cardinal' => '#772226',
    'Cardinal Red' => '#872A30',
    'Caribbean Blue' => '#B3D1CF',
    'Carolina Blue' => '#B9D6F0',
    'Carolina Blue' => '#A6BEDF',
    'Chambray' => '#C1D8E4',
    'Charcoal' => '#242424',
    'Charcoal' => '#585C60',
    'Charcoal' => '#464646',
    'Charcoal' => '#5D555C',
    'Charity Pink' => '#D56793',
    'Cherry Red' => '#A32B35',
    'Chestnut' => '#4A342C',
    'Chocolate' => '#302524',
    'Chocolate Fudge Brownie' => '#502F2C',
    'Cinnamon' => '#D28346',
    'Citrus' => '#C6E982',
    'Classic Pink' => '#E08CB0',
    'Classic Red' => '#9D2C30',
    'Classic Red' => '#B83E49',
    'Clay' => '#805838',
    'Coal' => '#323031',
    'Cobalt' => '#232B4E',
    'Combat Green' => '#323229',
    'Convoy Grey' => '#6A6A74',
    'Cool Heather Grey' => '#ECE8E7',
    'Copper' => '#7F4A33',
    'Coral' => '#C03F43',
    'Coral' => '#915D55',
    'Coral Silk' => '#EB806C',
    'Cornflower Blue' => '#9EB7DF',
    'Cotton Pink' => '#F3BFCB',
    'Cranberry' => '#A43559',
    'Cream' => '#FEFBEA',
    'Cream' => '#F1E4D7',
    'Cypress' => '#53594B',
    'Daisy' => '#E1C358',
    'Dark Chocolate' => '#3A2D25',
    'Dark Chocolate' => '#3A2E27',
    'Dark Grey' => '#191D1E',
    'Dark Heather' => '#67696F',
    'Dark Heather Blue' => '#2e394f',
    'Dark Heather Grey' => '#3B3B3A',
    'Dark Orange' => '#8A4729',
    'Dark Red' => '#6F1D1F',
    'Day Fall' => '#A97742',
    'Deck Chair Red' => '#D24342',
    'Deep Black' => '#181617',
    'Deep Metal' => '#626367',
    'Deep Sea Blue' => '#2B6083',
    'Denim Blue' => '#111E2A',
    'Denim Blue' => '#414872',
    'Desert Dust' => '#BBAFA1',
    'Desert Sand' => '#E7D4AA',
    'Digital Lavender' => '#A48AB5',
    'Dusky Pink' => '#D6ACB4',
    'Dusty Blue' => '#A1ADBE',
    'Dusty Green' => '#92A09D',
    'Dusty Lilac' => '#938996',
    'Dusty Pink' => '#D9ACAC',
    'Dusty Purple' => '#AD8F9A',
    'Dusty Rose' => '#CB898B',
    'Earthy Green' => '#69725B',
    'Ecru' => '#D6D2C0',
    'Ecru' => '#E3E0D5',
    'Emerald' => '#387F80',
    'Emerald' => '#203E32',
    'Eucalyptus' => '#928E74',
    'Faded Denim' => '#3E5772',
    'Festival Fuchsia' => '#952C65',
    'Fiesta' => '#ff502c',
    'Fire' => '#C13529',
    'Fire Red' => '#CB4334',
    'Fire Red' => '#B52937',
    'Flame Orange' => '#C57946',
    'Flo Blue' => '#5285D7',
    'Fluorescent Green' => '#A3C156',
    'Fluorescent Orange' => '#F0C78A',
    'Fluorescent Pink' => '#DF82A9',
    'Fluorescent Yellow' => '#DDDD49',
    'Forest' => '#295A4C',
    'Forest Green' => '#263825',
    'Forest Green' => '#3B503A',
    'Forest Green' => '#374233',
    'Fraiche Peche' => '#ECB79E',
    'French Navy' => '#3C4C6C',
    'French Navy' => '#252433',
    'French Navy' => '#3B404D',
    'Fuchsia' => '#AA5394',
    'Fuchsia' => '#C64B71',
    'Garnet' => '#9F293F',
    'Ginger Biscuit' => '#AC674A',
    'Glazed Green' => '#173C3D',
    'Go Green' => '#479C88',
    'Gold' => '#EBAD44',
    'Gold' => '#EDAF4D',
    'Gold' => '#EDB150',
    'Gold' => '#F6CB47',
    'Granite' => '#575960',
    'Granite' => '#A1A0A5',
    'Graphite Grey' => '#5E5D63',
    'Graphite Heather' => '#8E9096',
    'Graphite Heather' => '#807F81',
    'Green Bay' => '#68847F',
    'Grey' => '#636C6B',
    'Hawaiian Blue' => '#77C2EC',
    'Hazy Pink' => '#B69588',
    'Heather' => '#888787',
    'Heather Grey' => '#D4D4D4',
    'Heather Grey' => '#CAC9CB',
    'Heather Haze' => '#E6DDD6',
    'Heather Haze' => '#d9cfc9',
    'Heather Military Green' => '#848370',
    'Heather Navy' => '#606B84',
    'Heather Navy' => '#4E4C61',
    'Heather Oatmeal' => '#8E7E73',
    'Heather Rainbow' => '#D6CAC4',
    'Heather Royal' => '#6278B5',
    'Heather Surf' => '#79B9D1',
    'Heliconia' => '#C85073',
    'Hibiscus Rose' => '#805464',
    'Hot Chocolate' => '#443630',
    'Hot Pink' => '#D03F6B',
    'Hydro' => '#4F7FAA',
    'India Ink Grey' => '#434758',
    'Indigo Blue' => '#4E6274',
    'Indigo Hush' => '#473F58',
    'Ink Blue' => '#284056',
    'Ink Grey' => '#374042',
    'Irish Green' => '#429354',
    'Jade' => '#1B3F37',
    'Jade' => '#317287',
    'Jade Dome' => '#62B4AE',
    'Jet Black' => '#2A2221',
    'Kaffa Coffee' => '#775E5C',
    'Kelly Green' => '#3A8458',
    'Kelly Green' => '#3A845A',
    'Kelly Green' => '#367B53',
    'Kelly Green' => '#4FAF77',
    'Khaki' => '#5B5B51',
    'Khaki' => '#A8906E',
    'Khaki' => '#545547',
    'Kiwi' => '#98A95E',
    'Lagoon' => '#C3DCDA',
    'Lagoon Blue' => '#9BDBE5',
    'Lagoon Blue' => '#479DAE',
    'Lapis' => '#6972A4',
    'Lavender' => '#A08BB4',
    'Lavender' => '#B0AEC1',
    'Lavender' => '#CCB1C4',
    'Lavender' => '#D4BEE3',
    'Leaf Green' => '#63AB58',
    'Lemon' => '#F1E598',
    'Lemonade' => '#E8DE96',
    'Light Beige' => '#DDD1C1',
    'Light Blue' => '#ADC2D6',
    'Light Blue' => '#ADD8E6',
    'Light Charcoal' => '#3F494D',
    'Light Denim' => '#6F839C',
    'Light Grey' => '#BEC0C5',
    'Light Grey' => '#9C9E99',
    'Light Grey' => '#B8B5AD',
    'Light Oxford' => '#B1B0B5',
    'Light Pink' => '#F0D6DC',
    'Lime' => '#A7C98B',
    'Lime' => '#DEE0AD',
    'Lime' => '#D9E172',
    'Lime Flash' => '#E1D954',
    'Lime Green' => '#99BE45',
    'Lime Green' => '#9BD986',
    'Lipstick Pink' => '#CB4B59',
    'Magenta' => '#712C70',
    'Magenta Magic' => '#975193',
    'Majorelle Blue' => '#123067',
    'Mango' => '#C38B3F',
    'Maroon' => '#5A1F2F',
    'Mauve' => '#83737B',
    'Melange Grey' => '#757676',
    'Mid Heather Green' => '#7E9E8E',
    'Mid Heather Grey' => '#B7B5BA',
    'Mid Heather Khaki' => '#636556',
    'Midnight Blue' => '#424658',
    'Midnight Blue' => '#35374A',
    'Military Green' => '#4F523D',
    'Mineral' => '#82948D',
    'Mint' => '#57AFAD',
    'Mint Green' => '#C3D799',
    'Mint Green' => '#92C9AD',
    'Misty Jade' => '#B4D1B5',
    'Misty Pink' => '#EBCFBB',
    'Mocha Brown' => '#978480',
    'Moondust Grey' => '#CECECE',
    'Moss Green' => '#67684D',
    'Moss Green' => '#212315',
    'Moss Green' => '#576E6D',
    'Mushroom' => '#B0A797',
    'Mustard' => '#DEAD44',
    'Mustard' => '#DEAF61',
    'Mustard' => '#D1A145',
    'Natural' => '#E4DFDE',
    'Natural' => '#FAF7EF',
    'Natural' => '#C1B2A5',
    'Natural (Undyed)' => '#CAC2B4',
    'Natural Raw' => '#F8EDD7',
    'Natural Stone' => '#DCD7CE',
    'Navy' => '#0d1a23',
    'Navy' => '#161528',
    'Navy' => '#1E202B',
    'Navy' => '#2E3C59',
    'Navy Smoke' => '#252840',
    'New French Navy' => '#21202D',
    'Nude' => '#C4AE95',
    'Ochre' => '#B98436',
    'Off White' => '#EBE9E5',
    'Off-White' => '#FFFFF5',
    'Old Gold' => '#C29261',
    'Olive' => '#696B58',
    'Olive Green' => '#6B715D',
    'Olive Green' => '#635A4E',
    'Orange' => '#DD7336',
    'Orange' => '#DB6544',
    'Orange' => '#D6703B',
    'Orange' => '#C25B26',
    'Orange Crush' => '#EB8C35',
    'Orchid' => '#E2DDE3',
    'Orchid' => '#C0B5F2',
    'Orchid Flower' => '#8C2A67',
    'Oxford Grey' => '#55595C',
    'Oxford Navy' => '#22355A',
    'Oxford Navy' => '#272843',
    'Pale Blue' => '#B4C2C6',
    'Pale Lemon' => '#CFCA93',
    'Pale Pink' => '#F1D6C8',
    'Pastel Pink' => '#FAEBEB',
    'Peach Perfect' => '#EBCFBF',
    'Peppermint' => '#B4D9D9',
    'Petrol' => '#2B5166',
    'Petrol Blue' => '#424A52',
    'Pine Green' => '#22332B',
    'Pink' => '#EBD3D4',
    'Pinky Purple' => '#B96B94',
    'Pistachio' => '#B3B79C',
    'Pistachio Green' => '#DBDFC6',
    'Plum' => '#5B374B',
    'Plum' => '#403338',
    'Plum' => '#62316B',
    'Plum' => '#7E425E',
    'Powder' => '#999FAF',
    'Pumpkin Pie' => '#D98F41',
    'Purple' => '#544385',
    'Purple' => '#3E2351',
    'Purple' => '#5B3F6E',
    'Purple' => '#694282',
    'Purple Love' => '#674896',
    'Purple Rose' => '#B39396',
    'Red' => '#B43437',
    'Red' => '#9A3A44',
    'Red' => '#AB353A',
    'Red' => '#AB2822',
    'Red' => '#B85248',
    'Red Earth' => '#733638',
    'Red Hot Chilli' => '#A12A43',
    'Red Rust' => '#7B493F',
    'Rose Clay' => '#E79A83',
    'Royal' => '#39609D',
    'Royal' => '#334473',
    'Royal Blue' => '#263D90',
    'Royal Blue' => '#244A96',
    'Royal Blue' => '#255080',
    'Rs Sports Grey' => '#9A9B9E',
    'Rust' => '#91443D',
    'Safari' => '#9E987E',
    'Safety Green' => '#EDE78D',
    'Safety Orange' => '#E89E51',
    'Sage' => '#C8C3A9',
    'Sage' => '#7A8C7E',
    'Sage Green' => '#618271',
    'Sand' => '#E4DDDA',
    'Sand' => '#E1D8C3',
    'Sand' => '#B6B09F',
    'Sand' => '#D1C6B2',
    'Sapphire' => '#3A83BA',
    'Sapphire Blue' => '#367AB8',
    'Sapphire Blue' => '#2B65A9',
    'Sea Green' => '#204752',
    'Seafoam' => '#E8F3F4',
    'Serene Blue' => '#B5B6C6',
    'Shark Grey' => '#4F4E61',
    'Sherbet Lemon' => '#F3E5AA',
    'Sky Blue' => '#94CAEC',
    'Sky Blue' => '#A5B8D4',
    'Sky Blue' => '#D2DEEA',
    'Slate Green' => '#879C93',
    'Soft White' => '#FBF9EA',
    'Spectra Yellow' => '#EAB85A',
    'Sport Dark Green' => '#334F3B',
    'Sport Dark Navy' => '#262C3D',
    'Sport Grey' => '#C3C5CA',
    'Sport Royal' => '#2A3D8F',
    'Sport Scarlett Red' => '#AB272C',
    'Spring Green' => '#65BBA8',
    'Stargazer' => '#4A5866',
    'Steel Grey' => '#6B646A',
    'Stem Green' => '#EFF2D6',
    'Stone Wash Grey' => '#878787',
    'Storm' => '#A5ABA7',
    'Storm Grey' => '#4D494F',
    'Sun Yellow' => '#F5DB4B',
    'Sunflower' => '#F1C244',
    'Sunset Orange' => '#D34C3C',
    'Surf Blue' => '#59B3D2',
    'Sweet Lilac' => '#DBB6C4',
    'Teal' => '#2D667C',
    'Teal Monstera' => '#718F8B',
    'Topaz' => '#6EAC96',
    'Tropical Blue' => '#77C0DA',
    'Tropical Blue' => '#2B6393',
    'True Violet' => '#9599CB',
    'Turquoise Blue' => '#88C5C4',
    'Turquoise Surf' => '#85D0E0',
    'Ultra Violet' => '#45397B',
    'Urban Grey' => '#D0D3D4',
    'Vanilla Milkshake' => '#EFECE4',
    'Varsity Green' => '#32705C',
    'Vintage White' => '#EBE9E5',
    'Violet' => '#8086C5',
    'Walnut' => '#685B4C',
    'Wg Grey' => '#7F7F7F',
    'White' => '#FFFFFF',
    'White Heather' => '#E4E4E6',
    'White Mist' => '#F5F6F4',
    'Wild Mulberry' => '#68505C',
    'Worker Blue' => '#2A346F',
    'Yellow' => '#F5E34E',
    'Yellow' => '#D3C34F',
    'Yellow' => '#E2C15C',
    'Yellow' => '#E3B646',
];
            ?>
            <h4>Choose a colour</h4>
            <div class="color-swatches">
                <?php foreach ($colors as $color) : ?>
                    <label class="color-swatch" title="<?php echo esc_attr($color); ?>" style="background-color: <?php echo esc_attr($color_map[$color] ?? '#000'); ?>;">
                        <input type="radio" name="custom_color" value="<?php echo esc_attr($color); ?>" required>
                        <span class="swatch-circle"></span>
                    </label>
                <?php endforeach; ?>
            </div>

            <?php
            // Sizes
            $sizes = $get_attribute_values('Sizes');
            $sizes = !empty($sizes) ? $sizes : ['No Data'];
            ?>
            <h4>Quantity</h4>
            <div class="size-quantities">
                <?php foreach ($sizes as $size) : ?>
                    <div>
                        <label for="size_<?php echo esc_attr($size); ?>"><?php echo esc_html($size); ?></label>
                        <input type="number" name="size_quantities[<?php echo esc_attr($size); ?>]" id="size_<?php echo esc_attr($size); ?>" min="0" value="0">
                    </div>
                <?php endforeach; ?>
                <a href="#" class="size-guide">Size Guide</a>
            </div>

            <?php
            // Print areas
            $print_areas = $get_attribute_values('Print Areas');
            $print_areas = !empty($print_areas) ? $print_areas : ['No Data'];
            $area_images = [
                'Front' => 'center-front.png', // Replace with actual image URLs
                'Back' => 'center-back.png',
                'Left Sleeve' => 'left-sleeve.png',
                'Right Sleeve' => 'right-sleeve.png'
            ];
            ?>
            <h4>Print Area Options</h4>
            <div class="print-areas">
                <?php foreach ($print_areas as $area) : ?>
                    <?php $area_key = sanitize_key($area); ?>
                    <div class="print-area">
                        <img src="<?php echo esc_url($area_images[$area] ?? ''); ?>" alt="<?php echo esc_attr($area); ?>">
                        <label>
                            <input type="checkbox" name="print_areas[]" class="print-area-checkbox" value="<?php echo esc_attr($area); ?>" data-area="<?php echo esc_attr($area_key); ?>">
                            <?php echo esc_html(str_replace(' ', ' ', $area)); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php
            // Print techniques and options
            $techniques = $get_attribute_values('Print Techniques');
            $techniques = !empty($techniques) ? $techniques : ['No Data'];
            foreach ($print_areas as $area) {
                $area_key = sanitize_key($area);
                ?>
                <div class="print-technique-section" id="technique_<?php echo esc_attr($area_key); ?>" style="display:none;">
                    <h4>Choose Print Technique for <?php echo esc_html($area); ?></h4>
                    <div class="print-technique-buttons">
                        <?php foreach ($techniques as $technique) : ?>
                            <label>
                                <input type="radio" name="print_techniques[<?php echo esc_attr($area_key); ?>]" value="<?php echo esc_attr($technique); ?>" class="print-technique">
                                <span><?php echo esc_html($technique); ?></span>
                            </label>
                        <?php endforeach; ?>
                      
                    </div>

                    <?php foreach ($techniques as $technique) : ?>
                        <?php
                        $technique_key = sanitize_key($technique);
                        $option_attribute = $technique . ' Options';
                        $options = $get_attribute_values($option_attribute);
                        $options = !empty($options) ? $options : ['No Data'];
                        ?>
                        <div class="technique-options" id="options_<?php echo esc_attr($area_key); ?>_<?php echo esc_attr($technique_key); ?>" style="display:none;">
							   <?php if ($technique === 'Printing') : ?>
                            <label>How many colours in your design?</label>
                            <div class="options-list">
                                <?php foreach ($options as $option) : ?>
                                    <label>
                                        <input type="checkbox" name="technique_options[<?php echo esc_attr($area_key); ?>][<?php echo esc_attr($technique_key); ?>][]" value="<?php echo esc_attr($option); ?>">
                                        <?php echo esc_html($option); ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
							  <?php endif; ?>

                            <?php if ($technique === 'Embroidery') : ?>
                                <label>Embroidery options</label>
                                <div class="options-list">
                                    <label>
                                        <input type="radio" name="technique_options[<?php echo esc_attr($area_key); ?>][<?php echo esc_attr($technique_key); ?>][size]" value="5cm x 5cm or smaller">
                                        5cm x 5cm or smaller
                                    </label>
                                    <label>
                                        <input type="radio" name="technique_options[<?php echo esc_attr($area_key); ?>][<?php echo esc_attr($technique_key); ?>][size]" value="Larger than 5cm x 5cm">
                                        Larger than 5cm x 5cm
                                    </label>
                                </div>
                            <?php endif; ?>

                           
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php } ?>

           <div class="upload-buttons">
                <button type="button" style="display:none;" class="upload-button">Upload Your Logo/Graphic</button>
                <input type="file" name="logo_upload" style="display:none;" id="logo-upload">
                <input type="submit" name="add_to_basket" value="Add to quote basket" class="request-quote-button">
			       <input type="hidden" name="product_id" value="<?php echo esc_attr( $product_id ); ?>">

            </div>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_product_fields', 'custom_product_fields_shortcode');
