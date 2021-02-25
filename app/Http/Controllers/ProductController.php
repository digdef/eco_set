<?php

namespace App\Http\Controllers;

use App;
use App\Models\Category;
use App\Models\CeoText;
use App\Models\CeoTextLink;
use App\Models\Comparison;
use App\Models\Favorites;
use App\Models\Modification;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockToProducts;
use App\Models\Hints;
use App\Models\Water;
use Cookie;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	const CATEGORY_TITLE_TEMPLATE = '{DB_TITLE} - купить в СПб по выгодной цене с установкой';
	const CATEGORY_DESCRIPTION_TEMPLATE = 'Купить {DB_DESCRIPTION} для частного дома, дачи, загородного коттеджа. Официальный дилер ведущих производителей септиков для автономной канализации.';

	const PRODUCT_TITLE_TEMPLATE = '{DB_TITLE} - купить в СПб по цене производителя';
	const PRODUCT_DESCRIPTION_TEMPLATE = 'Купить {DB_DESCRIPTION} с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';

	const CATEGORY_ACCESSORIES  = 'Комплектующие';
	const CATEGORY_CELLARS      = 'Погреба';
	const CATEGORY_SEPTICS      = 'Септики';
	const CATEGORY_WATER        = 'Водоснабжение';
    public function catalog(Request $request, $cat)
    {
        $hint = Hints::where('id', 1)->first();
		$cat_title = '';
        if ($cat == 1) {
            return redirect('catalog/septic');
        } elseif ($cat == 2) {
            return redirect('catalog/cellars');
        } elseif ($cat == 3) {
            return redirect('catalog/water');
        } elseif ($cat == 4) {
            return redirect('catalog/accessories');
        }

        if ($cat == 'septic') {
            $cat = 1;
	        $cat_title = self::CATEGORY_SEPTICS;
            $cat_url = 'septic';
        } elseif ($cat == 'cellars') {
            $cat = 2;
	        $cat_title = self::CATEGORY_CELLARS;
            $cat_url = 'cellars';
        } elseif ($cat == 'water') {
	        $cat_title = self::CATEGORY_WATER;
            $cat = 3;
            $cat_url = 'water';
        } elseif ($cat == 'accessories') {
	        $cat_title = self::CATEGORY_ACCESSORIES;
            $cat = 4;
            $cat_url = 'accessories';
        }

        $products = Product::where('category', $cat)->get();

        $filter = false;

        $price = array();

        foreach ($products as $product) {
            array_push($price, $product->price);

//            $objProduct = new Product();
//
//            $objProduct = $objProduct->where('id', '=', $product->id)->update([
//                'performance' => str_replace(',','.',$product->performance)
//            ]);
        }
        $price_min = !empty($price) ? min($price) : 0;
        $price_max = !empty($price) ? max($price) : 1000;

        $productsQuery = Product::query();

        $prod = collect([]);

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        if ($request->filled('type_septic')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->type_septic as $type_septic) {
                    $query->orWhere('type_septic', '=', $type_septic);
                }
            });

            foreach ($request->type_septic as $type_septic) {
                $prod->push('type_septic: ' . $type_septic);
            }
        }

        if ($request->filled('manufacturer')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->manufacturer as $manufacturer) {
                    $query->orWhere('manufacturer', '=', $manufacturer);
                }
            });

            foreach ($request->manufacturer as $manufacturer) {
                $prod->push('manufacturer: ' . $manufacturer);
            }
        }

        if ($request->filled('persons')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->persons as $persons) {
                    if ($persons == '15') {
                        $query->orWhereBetween('persons', array(15, 17));
                    } elseif ($persons == '18') {
                        $query->orWhereBetween('persons', array(18, 19));
                    } elseif ($persons == '20') {
                        $query->orWhereBetween('persons', array(20, 24));
                    } elseif ($persons == '25') {
                        $query->orWhereBetween('persons', array(25, 29));
                    } elseif ($persons == '30') {
                        $query->orWhere('persons', '>=', 30);
                    } else {
                        $query->orWhere('persons', '=', $persons);
                    }
                }
            });

            foreach ($request->persons as $persons) {
                $prod->push('persons: ' . $persons);
            }
        }

        if ($request->filled('performance')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->performance as $performance) {
                    if ($performance == '600') {
                        $query->orWhere('performance', '<=', 0.79);
                    } elseif ($performance == '800') {
                        $query->orWhereBetween('performance', array(0.8, 0.999));
                    } elseif ($performance == '1000') {
                        $query->orWhereBetween('performance', array(1, 1.199));
                    } elseif ($performance == '1200') {
                        $query->orWhereBetween('performance', array(1.2, 1.399));
                    } elseif ($performance == '1400') {
                        $query->orWhereBetween('performance', array(1.4, 1.599));
                    } elseif ($performance == '1600') {
                        $query->orWhereBetween('performance', array(1.6, 1.799));
                    } elseif ($performance == '1800') {
                        $query->orWhereBetween('performance', array(1.8, 1.999));
                    } elseif ($performance == '2000') {
                        $query->orWhereBetween('performance', array(2, 2.399));
                    } elseif ($performance == '2400') {
                        $query->orWhereBetween('performance', array(2.4, 2.999));
                    } elseif ($performance == '3000') {
                        $query->orWhereBetween('performance', array(3, 3.999));
                    } elseif ($performance == '4000') {
                        $query->orWhereBetween('performance', array(4, 5.999));
                    } elseif ($performance == '6000') {
                        $query->orWhereBetween('performance', array(5, 7.999));
                    } elseif ($performance == '8000') {
                        $query->orWhereBetween('performance', array(6, 9.999));
                    } elseif ($performance == '10000') {
                        $query->orWhere('performance', '>=', 10);
                    }
                }
            });

            foreach ($request->performance as $performance) {
                $prod->push('performance: ' . $performance);
            }
        }

        if ($request->filled('reset_type')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->reset_type as $reset_type) {
                    $query->orWhere('reset_type', '=', $reset_type);
                }
            });

            foreach ($request->reset_type as $reset_type) {
                $prod->push('reset_type: ' . $reset_type);
            }
        }

        if ($request->filled('type_of_shell')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->type_of_shell as $type_of_shell) {
                    $query->orWhere('type_of_shell', '=', $type_of_shell);
                }
            });

            foreach ($request->type_of_shell as $type_of_shell) {
                $prod->push('type_of_shell: ' . $type_of_shell);
            }
        }

        if ($request->filled('insert_depth')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->insert_depth as $insert_depth) {
                    if ($insert_depth == '600') {
                        $query->orWhere('insert_depth', '<=', 60);
                    } elseif ($insert_depth == '800') {
                        $query->orWhereBetween('insert_depth', array(61, 80));
                    } elseif ($insert_depth == '1200') {
                        $query->orWhereBetween('insert_depth', array(81, 120));
                    } elseif ($insert_depth == '1500') {
                        $query->orWhere('insert_depth', '>=', 121);
                    }
                }
            });

            foreach ($request->insert_depth as $insert_depth) {
                $prod->push('insert_depth: ' . $insert_depth);
            }
        }

        if ($request->filled('useful_volume')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->useful_volume as $useful_volume) {

                    if ($useful_volume == '1') {
                        $query->orWhere('useful_volume', '=', 1);
                    } elseif ($useful_volume == '1_2') {
                        $query->orWhere('useful_volume', '=', 1);
                        $query->orWhere('useful_volume', '=', 2);
                    } elseif ($useful_volume == '2_3') {
                        $query->orWhere('useful_volume', '=', 2);
                        $query->orWhere('useful_volume', '=', 3);
                    } elseif ($useful_volume == '3') {
                        $query->orWhere('useful_volume', '>', 3);
                    }
                }
            });

            foreach ($request->useful_volume as $reset_type) {
                $prod->push('useful_volume: ' . $reset_type);
            }
        }

        if ($request->filled('page')) {
            $filter = true;
        }

        $orderBy_name = Cookie::get('orderBy_name');
        $orderBy_val = Cookie::get('orderBy_val');

        if (!$orderBy_name) {
            $minutes = 525000;

            Cookie::queue('orderBy_name', 'price', $minutes);
            Cookie::queue('orderBy_val', 'asc', $minutes);

            $orderBy_name = 'price';
            $orderBy_val = 'asc';
        }

        $products = $productsQuery->where('category', $cat)->orderBy('persons', 'asc')->orderBy($orderBy_name, $orderBy_val)->paginate(12);


        $user = Cookie::get('name');

        $favorites_user = collect([]);
        $comparisons_user = collect([]);

        $price = array();

        $stockToProducts = collect([]);
        $stock = collect([]);

        foreach ($products as $product) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparison) {
                $comparisons_user->push($product->id);
            }

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
            }
        }

        foreach ($products as $product) {
            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($favorites) {
                $favorites_user->push($product->id);
            }
        }

        $categories = Category::where('type', $cat)
            ->orderBy('id', 'asc')
            ->get();



        if ($cat == 1) {
            $template = 'page.catalog.catalog';
        } elseif ($cat == 2) {
            $template = 'page.catalog.catalog_cellars';
        } elseif ($cat == 3) {
            $template = 'page.catalog.catalog_water';
        } elseif ($cat == 4) {
            $template = 'page.catalog.catalog_accessories';
        } else {
            return view('404');
        }


        $ceo_text = CeoText::where('type', $cat_url)->first();

        if (isset($ceo_text)) {
            $links = CeoTextLink::where('id_ceo', $ceo_text->id)->get();
        } else {
            $links =  collect([]);
        }

        $url = $_SERVER['REQUEST_URI'];

	    $ceo_text->meta_title = $this->getTemplatedString(
		    empty($product->meta_title)? $ceo_text->meta_title ? $ceo_text->meta_title : $cat_title:$product->meta_title,
		    self::CATEGORY_TITLE_TEMPLATE,
		    '{DB_TITLE}'
	    );
	    $ceo_text->meta_description = $this->getTemplatedString(
	    	empty($ceo_text->meta_description)? $ceo_text->meta_description ? $ceo_text->meta_description : $cat_title :$ceo_text->meta_description,
		    self::CATEGORY_DESCRIPTION_TEMPLATE,
		    '{DB_DESCRIPTION}'
	    );
        return view($template, compact(
            'products',
            'hint',
            'orderBy_val',
            'orderBy_name',
            'favorites_user',
            'comparisons_user',
            'prod',
            'categories',
            'price_min',
            'price_max',
            'stockToProducts',
            'stock',
            'ceo_text',
            'links',
            'cat',
            'url',
            'filter',
            'cat_url'
        ));
    }

    public function catalog_mod(Request $request, $mod)
    {
        $hint = Hints::where('id', 1)->first();

        $modification = Category::where('url', $mod)->orwhere('id', $mod)->first();

        if ($modification->url != null && $modification->id == $mod) {
            return redirect('catalog/mod/' . $modification->url);
        }

        $mod = $modification->id;

        $cat = $modification->type;
        $cat_name = '';
        if ($cat == 1) {
            $cat_name = self::CATEGORY_SEPTICS;
            $cat_url = 'septic';
        } elseif ($cat == 2) {
            $cat_name = self::CATEGORY_CELLARS;
            $cat_url = 'cellars';
        } elseif ($cat == 3) {
            $cat_name = self::CATEGORY_WATER;
            $cat_url = 'water';
        } elseif ($cat == 4) {
            $cat_name = self::CATEGORY_ACCESSORIES;
            $cat_url = 'accessories';
        }


        $filter = false;

        $productsQuery = Product::query();
        $prod = collect([]);

        $orderBy_name = Cookie::get('orderBy_name');
        $orderBy_val = Cookie::get('orderBy_val');

        if (!$orderBy_name) {
            $minutes = 525000;

            Cookie::queue('orderBy_name', 'price', $minutes);
            Cookie::queue('orderBy_val', 'asc', $minutes);

            $orderBy_name = 'price';
            $orderBy_val = 'asc';
        }

        $products = $productsQuery->where('manufacturer', '=', $mod)->orderBy('persons', 'asc')->orderBy($orderBy_name, $orderBy_val)->paginate(12);


        $user = Cookie::get('name');

        $favorites_user = collect([]);
        $comparisons_user = collect([]);

        $stockToProducts = collect([]);
        $stock = collect([]);

        foreach ($products as $product) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparison) {
                $comparisons_user->push($product->id);
            }

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
            }
        }


        foreach ($products as $product) {
            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($favorites) {
                $favorites_user->push($product->id);
            }
        }

        $categories = Category::where('type', $cat)
            ->orderBy('id', 'asc')
            ->get();


        $products_arr = Product::where('category', $cat)->get();

        $price = array();

        foreach ($products_arr as $product) {
            array_push($price, $product->price);
        }
        $price_min = !empty($price) ? min($price) : 0;
        $price_max = !empty($price) ? max($price) : 1000;


        if ($cat == 1) {
            $template = 'page.catalog.catalog';
            $ceo_text = CeoText::where('id_content', $modification->id)->where('type', 'mod')->first();
            $ceo_text->meta_title = self::CATEGORY_SEPTICS;
            $ceo_text->meta_description = self::CATEGORY_SEPTICS;
        } elseif ($cat == 2) {
            $template = 'page.catalog.catalog_cellars';
            $ceo_text = CeoText::where('id_content', $modification->id)->where('type', 'mod')->first();
            $ceo_text->meta_title = self::CATEGORY_CELLARS;
            $ceo_text->meta_description = self::CATEGORY_CELLARS;
        } elseif ($cat == 3) {
            $template = 'page.catalog.catalog_water';
            $ceo_text = CeoText::where('id', 2)->where('type', 'mod')->first();
            $ceo_text->meta_title = self::CATEGORY_WATER;
            $ceo_text->meta_description = self::CATEGORY_WATER;
        } elseif ($cat == 4) {
            $template = 'page.catalog.catalog_accessories';
            $ceo_text = CeoText::where('id_content', $modification->id)->where('type', 'mod')->first();
            $ceo_text->meta_title = self::CATEGORY_ACCESSORIES;
            $ceo_text->meta_description = self::CATEGORY_ACCESSORIES;
        }

        if ($modification->meta_title) {
            $ceo_text->meta_title = $modification->meta_title;
        }
        if ($modification->meta_title) {
            $ceo_text->meta_description = $modification->meta_description;
        }

        $ceo_text->meta_title = $this->getTemplatedString(
            $cat_name.' '.$modification->title,
            self::CATEGORY_TITLE_TEMPLATE,
            '{DB_TITLE}'
        );
        $ceo_text->meta_description = $this->getTemplatedString(
            $cat_name.' '.$modification->title,
            self::PRODUCT_DESCRIPTION_TEMPLATE,
            '{DB_DESCRIPTION}'
        );
        return view($template, compact(
            'products',
            'hint',
            'orderBy_val',
            'orderBy_name',
            'favorites_user',
            'comparisons_user',
            'prod',
            'categories',
            'price_min',
            'price_max',
            'stockToProducts',
            'stock',
            'ceo_text',
            'cat',
            'modification',
            'filter',
            'cat_url'
        ));
    }

    public function filter(Request $request, $cat)
    {
        if ($cat == 'septic') {
            $cat = 1;
            $cat_url = 'septic';
        } elseif ($cat == 'cellars') {
            $cat = 2;
            $cat_url = 'cellars';
        } elseif ($cat == 'water') {
            $cat = 3;
            $cat_url = 'water';
        } elseif ($cat == 'accessories') {
            $cat = 4;
            $cat_url = 'accessories';
        }



        $productsQuery = Product::query();

        $prod = collect([]);

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        if ($request->filled('type_septic')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->type_septic as $type_septic) {
                    $query->orWhere('type_septic', '=', $type_septic);
                }
            });
        }

        if ($request->filled('manufacturer')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->manufacturer as $manufacturer) {
                    $query->orWhere('manufacturer', '=', $manufacturer);
                }
            });
        }

        if ($request->filled('persons')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->persons as $persons) {
                    if ($persons == '15') {
                        $query->orWhereBetween('persons', array(15, 17));
                    } elseif ($persons == '18') {
                        $query->orWhereBetween('persons', array(18, 19));
                    } elseif ($persons == '20') {
                        $query->orWhereBetween('persons', array(20, 24));
                    } elseif ($persons == '25') {
                        $query->orWhereBetween('persons', array(25, 29));
                    } elseif ($persons == '30') {
                        $query->orWhere('persons', '>=', 30);
                    } else {
                        $query->orWhere('persons', '=', $persons);
                    }
                }
            });

            foreach ($request->persons as $persons) {
                $prod->push('persons: ' . $persons);
            }
        }

        if ($request->filled('performance')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->performance as $performance) {

                    if ($performance == '600') {
                        $query->orWhere('performance', '<=', 0.79);
                    } elseif ($performance == '800') {
                        $query->orWhereBetween('performance', array(0.8, 0.99));
                    } elseif ($performance == '1000') {
                        $query->orWhereBetween('performance', array(1, 1.19));
                    } elseif ($performance == '1200') {
                        $query->orWhereBetween('performance', array(1.2, 1.39));
                    } elseif ($performance == '1400') {
                        $query->orWhereBetween('performance', array(1.4, 1.59));
                    } elseif ($performance == '1600') {
                        $query->orWhereBetween('performance', array(1.6, 1.79));
                    } elseif ($performance == '1800') {
                        $query->orWhereBetween('performance', array(1.8, 1.99));
                    } elseif ($performance == '2000') {
                        $query->orWhereBetween('performance', array(2, 2.39));
                    } elseif ($performance == '2400') {
                        $query->orWhereBetween('performance', array(2.4, 2.99));
                    } elseif ($performance == '3000') {
                        $query->orWhereBetween('performance', array(3, 3.99));
                    } elseif ($performance == '4000') {
                        $query->orWhereBetween('performance', array(4, 5.99));
                    } elseif ($performance == '6000') {
                        $query->orWhereBetween('performance', array(5, 7.99));
                    } elseif ($performance == '8000') {
                        $query->orWhereBetween('performance', array(6, 9.99));
                    } elseif ($performance == '10000') {
                        $query->orWhere('performance', '>=', 10);
                    }
                }
            });

            foreach ($request->performance as $performance) {
                $prod->push('performance: ' . $performance);
            }
        }

        if ($request->filled('reset_type')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->reset_type as $reset_type) {
                    $query->orWhere('reset_type', '=', $reset_type);
                }
            });

            foreach ($request->reset_type as $reset_type) {
                $prod->push('reset_type: ' . $reset_type);
            }
        }

        if ($request->filled('type_of_shell')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->type_of_shell as $type_of_shell) {
                    $query->orWhere('type_of_shell', '=', $type_of_shell);
                }
            });

            foreach ($request->type_of_shell as $type_of_shell) {
                $prod->push('type_of_shell: ' . $type_of_shell);
            }
        }

        if ($request->filled('insert_depth')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->insert_depth as $insert_depth) {
                    if ($insert_depth == '600') {
                        $query->orWhere('insert_depth', '<=', 60);
                    } elseif ($insert_depth == '800') {
                        $query->orWhereBetween('insert_depth', array(61, 80));
                    } elseif ($insert_depth == '1200') {
                        $query->orWhereBetween('insert_depth', array(81, 120));
                    } elseif ($insert_depth == '1500') {
                        $query->orWhere('insert_depth', '>=', 121);
                    }
                }
            });

            foreach ($request->insert_depth as $insert_depth) {
                $prod->push('insert_depth: ' . $insert_depth);
            }
        }

        if ($request->filled('useful_volume')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->useful_volume as $useful_volume) {
                    if ($useful_volume == '1') {
                        $query->orWhere('useful_volume', '=', 1);
                    } elseif ($useful_volume == '1_2') {
                        $query->orWhere('useful_volume', '=', 1);
                        $query->orWhere('useful_volume', '=', 2);
                    } elseif ($useful_volume == '2_3') {
                        $query->orWhere('useful_volume', '=', 2);
                        $query->orWhere('useful_volume', '=', 3);
                    } elseif ($useful_volume == '3') {
                        $query->orWhere('useful_volume', '>', 3);
                    }
                }
            });

            foreach ($request->useful_volume as $reset_type) {
                $prod->push('useful_volume: ' . $reset_type);
            }
        }

        $orderBy_name = Cookie::get('orderBy_name');
        $orderBy_val = Cookie::get('orderBy_val');

        if ($request->price_filter) {
            $value1 = 'price';
            $value2 = $request->price_filter;

            $minutes = 525000;

            Cookie::queue('orderBy_name', $value1, $minutes);
            Cookie::queue('orderBy_val', $value2, $minutes);

            if (Cookie::get('orderBy_name_persons') == 'true') {
                Cookie::queue('orderBy_name_persons', 'false', $minutes);
            }

            $orderBy_name = $value1;
            $orderBy_val = $value2;
        }

        if (!$request->price_filter) {
            $minutes = 525000;

            Cookie::queue('orderBy_name', 'price', $minutes);
            Cookie::queue('orderBy_val', 'asc', $minutes);

            $orderBy_name = 'price';
            $orderBy_val = 'asc';
        }

        $products = $productsQuery->where('category', $cat)->orderBy('persons', 'asc')->orderBy($orderBy_name, $orderBy_val)->paginate(12);

        if ($request->filled('search')) {
            $search = $request->search;

            $products = Product::where('title', 'LIKE', "%$search%")->orderBy('persons', 'asc')->orderBy($orderBy_name, $orderBy_val)->paginate(12);
        }

        $count_result = count($products) > 0;
        if ($count_result) {
            $reply = true;
        } else {
            $reply = false;
        }
        $user = Cookie::get('name');

        $favorites_user = collect([]);
        $comparisons_user = collect([]);
        $stockToProducts = collect([]);
        $stock = collect([]);

        foreach ($products as $product) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparison) {
                $comparisons_user->push($product->id);
            }


            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
            }
        }

        foreach ($products as $product) {
            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($favorites) {
                $favorites_user->push($product->id);
            }
        }

        return view('page.catalog.catalog_card',
            compact(
                'products',
                'favorites_user',
                'stockToProducts',
                'stock',
                'comparisons_user',
                'prod',
                'cat',
                'reply'
            ));
    }

    public function title_filter(Request $request, $cat)
    {
        if ($cat == 'septic') {
            $cat = 1;
            $cat_url = 'septic';
        } elseif ($cat == 'cellars') {
            $cat = 2;
            $cat_url = 'cellars';
        } elseif ($cat == 'water') {
            $cat = 3;
            $cat_url = 'water';
        } elseif ($cat == 'accessories') {
            $cat = 4;
            $cat_url = 'accessories';
        }

        $productsQuery = Product::query();

        $prod = collect([]);

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        if ($request->filled('type_septic')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->type_septic as $type_septic) {
                    $query->orWhere('type_septic', '=', $type_septic);
                }
            });
        }

        if ($request->filled('manufacturer')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->manufacturer as $manufacturer) {
                    $query->orWhere('manufacturer', '=', $manufacturer);
                }
            });
        }

        if ($request->filled('persons')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->persons as $persons) {
                    if ($persons == '15') {
                        $query->orWhereBetween('persons', array(15, 17));
                    } elseif ($persons == '18') {
                        $query->orWhereBetween('persons', array(18, 19));
                    } elseif ($persons == '20') {
                        $query->orWhereBetween('persons', array(20, 24));
                    } elseif ($persons == '25') {
                        $query->orWhereBetween('persons', array(25, 29));
                    } elseif ($persons == '30') {
                        $query->orWhere('persons', '>=', 30);
                    } else {
                        $query->orWhere('persons', '=', $persons);
                    }
                }
            });

//            $minutes = 525000;
//
//            Cookie::queue('orderBy_name', 'price', $minutes);
//            Cookie::queue('orderBy_val', 'asc', $minutes);
//
//            $productsQuery->orderBy('persons', 'asc');

            foreach ($request->persons as $persons) {
                $prod->push('persons: ' . $persons);
            }
        }

        if ($request->filled('performance')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->performance as $performance) {

                    if ($performance == '600') {
                        $query->orWhere('performance', '<=', 0.79);
                    } elseif ($performance == '800') {
                        $query->orWhereBetween('performance', array(0.8, 0.99));
                    } elseif ($performance == '1000') {
                        $query->orWhereBetween('performance', array(1, 1.19));
                    } elseif ($performance == '1200') {
                        $query->orWhereBetween('performance', array(1.2, 1.39));
                    } elseif ($performance == '1400') {
                        $query->orWhereBetween('performance', array(1.4, 1.59));
                    } elseif ($performance == '1600') {
                        $query->orWhereBetween('performance', array(1.6, 1.79));
                    } elseif ($performance == '1800') {
                        $query->orWhereBetween('performance', array(1.8, 1.99));
                    } elseif ($performance == '2000') {
                        $query->orWhereBetween('performance', array(2, 2.39));
                    } elseif ($performance == '2400') {
                        $query->orWhereBetween('performance', array(2.4, 2.99));
                    } elseif ($performance == '3000') {
                        $query->orWhereBetween('performance', array(3, 3.99));
                    } elseif ($performance == '4000') {
                        $query->orWhereBetween('performance', array(4, 5.99));
                    } elseif ($performance == '6000') {
                        $query->orWhereBetween('performance', array(5, 7.99));
                    } elseif ($performance == '8000') {
                        $query->orWhereBetween('performance', array(6, 9.99));
                    } elseif ($performance == '10000') {
                        $query->orWhere('performance', '>=', 10);
                    }
                }
            });

            foreach ($request->performance as $performance) {
                $prod->push('performance: ' . $performance);
            }
        }


        if ($request->filled('reset_type')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->reset_type as $reset_type) {
                    $query->orWhere('reset_type', '=', $reset_type);
                }
            });

            foreach ($request->reset_type as $reset_type) {
                $prod->push('reset_type: ' . $reset_type);
            }
        }

        if ($request->filled('type_of_shell')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->type_of_shell as $type_of_shell) {
                    $query->orWhere('type_of_shell', '=', $type_of_shell);
                }
            });

            foreach ($request->type_of_shell as $type_of_shell) {
                $prod->push('type_of_shell: ' . $type_of_shell);
            }
        }

        if ($request->filled('insert_depth')) {
            $productsQuery->where(function ($query) use ($request) {
                foreach ($request->insert_depth as $insert_depth) {
                    if ($insert_depth == '600') {
                        $query->orWhere('insert_depth', '<=', 60);
                    } elseif ($insert_depth == '800') {
                        $query->orWhereBetween('insert_depth', array(61, 80));
                    } elseif ($insert_depth == '1200') {
                        $query->orWhereBetween('insert_depth', array(81, 120));
                    } elseif ($insert_depth == '1500') {
                        $query->orWhere('insert_depth', '>=', 121);
                    }
                }
            });

            foreach ($request->insert_depth as $insert_depth) {
                $prod->push('insert_depth: ' . $insert_depth);
            }
        }


        $orderBy_name = Cookie::get('orderBy_name');
        $orderBy_val = Cookie::get('orderBy_val');

        if ($request->title_filter) {
            $value1 = 'title';
            $value2 = $request->title_filter;

            $minutes = 525000;

            Cookie::queue('orderBy_name', $value1, $minutes);
            Cookie::queue('orderBy_val', $value2, $minutes);

            $orderBy_name = $value1;
            $orderBy_val = $value2;

            if (Cookie::get('orderBy_name_persons') == 'true') {
                Cookie::queue('orderBy_name_persons', 'false', $minutes);
            }
        }

        $products = $productsQuery->where('category', $cat)->orderBy('persons', 'asc')->orderBy($orderBy_name, $orderBy_val)->paginate(12);


        if ($request->filled('search')) {
            $search = $request->search;

            $products = Product::where('title', 'LIKE', "%$search%")->orderBy('persons', 'asc')->orderBy($orderBy_name, $orderBy_val)->paginate(12);
        }

        $user = Cookie::get('name');

        $favorites_user = collect([]);
        $comparisons_user = collect([]);
        $stockToProducts = collect([]);
        $stock = collect([]);

        foreach ($products as $product) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($comparison) {
                $comparisons_user->push($product->id);
            }

            $sTP = StockToProducts::where('id_product', $product->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProducts->push($sTP);

                $stock->push($st);
            }
        }

        foreach ($products as $product) {
            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

            if ($favorites) {
                $favorites_user->push($product->id);
            }
        }

        $reply = true;


        return view('page.catalog.catalog_card',
            compact(
                'products',
                'favorites_user',
                'stockToProducts',
                'stock',
                'comparisons_user',
                'prod',
                'cat',
                'reply'
            ));
    }

    public function product(Request $request, $url)
    {
        $hint = Hints::where('id', 1)->first();

        $product = Product::where('url', $url)->orwhere('id', $url)->first();

        if ($product->url != null && $product->id == $url) {
            return redirect('product/' . $product->url);
        }

        $id = $product->id;

        if (!$product) {
            return view('404');
        }

        $stockToProducts = StockToProducts::where('id_product', $id)->first();

        if ($stockToProducts) {
            $stock = Stocks::where('id', $stockToProducts->id_stock)->first();
        } else {
            $stock = new Stocks();
        }


        $favorites_user = collect([]);
        $comparisons_user = collect([]);

        $user = Cookie::get('name');

        $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

        if ($favorites) {
            $favorites_user->push($product->id);
        }

        $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

        if ($comparison) {
            $comparisons_user->push($product->id);
        }

        $modification = Modification::find($product->modification);

        $category = Category::find($modification->category);

        $product_modifications = Product::where('modification', $product->modification)
            ->orderBy('price', 'asc')
            ->get();

        $create_seo_text = function () use ($id){
        	$finded_text = CeoText::where('id_content', $id)->where('type', NULL)->first();
        	return (empty($finded_text)?new CeoText():$finded_text);
        };
	    $ceo_text = $create_seo_text();
        if (!$product->meta_title) {
            $ceo_text->meta_title = $this->getTemplatedString(
                (empty($product->meta_title)?$product->title:$product->meta_title),
                self::PRODUCT_TITLE_TEMPLATE,
                '{DB_TITLE}'
            );
        } else {
            $ceo_text->meta_title = $product->meta_title;
        }
	    $ceo_text->meta_description = $this->getTemplatedString(
	    	(empty($product->meta_description)?$product->title:$product->meta_description),
		    self::PRODUCT_DESCRIPTION_TEMPLATE,
		    '{DB_DESCRIPTION}'
	    );

        $products = DB::table('products')
            ->orderByRaw("RAND()")
            ->where('category', $category->type)
            ->where('performance', $product->performance)
            ->limit(4)
            ->get();

        $products_advise = DB::table('products')
            ->where('advise', 1)
            ->where('manufacturer', $product->manufacturer)
            ->where('persons', $product->persons)
            ->orderByRaw("RAND()")
            ->limit(8)
            ->get();


        $favorites_user = collect([]);
        $comparisons_user = collect([]);
        $stockToProd = collect([]);
        $stoc = collect([]);

        foreach ($products as $prod) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $prod->id)->first();

            if ($comparison) {
                $comparisons_user->push($prod->id);
            }


            $sTP = StockToProducts::where('id_product', $prod->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProd->push($sTP);

                $stock->push($st);
            }

            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $prod->id)->first();

            if ($favorites) {
                $favorites_user->push($prod->id);
            }
        }

        foreach ($products_advise as $prod) {
            $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $prod->id)->first();

            if ($comparison) {
                $comparisons_user->push($prod->id);
            }


            $sTP = StockToProducts::where('id_product', $prod->id)->first();

            if ($sTP) {
                $st = Stocks::where('id', $sTP->id_stock)->first();

                $stockToProd->push($sTP);

                $stock->push($st);
            }

            $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $prod->id)->first();

            if ($favorites) {
                $favorites_user->push($prod->id);
            }
        }

        if ($product->category == 1) {
            $cat = 'septic';
        } elseif ($product->category == 2) {
            $cat = 'cellars';
        } elseif ($product->category == 4) {
            $cat = 'accessories';
        }

        return view('page.catalog.product', compact(
            'product',
            'products',
            'favorites_user',
            'product_modifications',
            'comparisons_user',
            'modification',
            'stock',
            'category',
            'ceo_text',
            'products_advise',
            'stockToProd',
            'stoc',
            'hint',
            'cat'
        ));
    }

    public function price_list($cat)
    {
        $products = Product::where('category', $cat)->get();

        if (!$products) {
            return view('404');
        }

        $categories = Category::all();

        $mod = 0;



        if ($cat == 1) {
            $cat_url = 'septic';
        } elseif ($cat == 2) {
            $cat_url = 'cellars';
        } elseif ($cat == 3) {
            $cat_url = 'water';
        } elseif ($cat == 4) {
            $cat_url = 'accessories';
        } else {
            $cat_url = false;
        }


        if ($cat_url) {
            $categ = CeoText::where('type', $cat_url)->first();
        } else {
            $categ  = false;
        }


        $ceo_text = $this->getPriceListCeoText($cat);

        return view('page.price.price_septics', compact('categories', 'products', 'mod', 'cat', 'categ', 'ceo_text'));
    }

    public function price_list_modification($mod)
    {
        $products = collect([]);

        $categories = Category::all();

        $category = Category::find($mod);

        if (!$category) {
            return view('404');
        }

        $modifications = Modification::where('category', '=', $mod)->get();

        foreach ($modifications as $modification) {
            $product = Product::where('modification', $modification->id)->get();

            foreach ($product as $prod) {
                $products->push($prod);
            }
        }

        $cat = $category->type;

        $categ = $category;

        $ceo_text = $this->getPriceListCeoText($mod);

        return view('page.price.price_septics', compact('categories', 'products', 'mod', 'cat', 'categ', 'ceo_text'));
    }
    private function getPriceListCeoText ($cat_id = null){
        $ceo_text = new CeoText();
        switch ($cat_id){
            case 1:
                $ceo_text->meta_title       = 'Цены на септики';
                $ceo_text->meta_description = 'Цены на септики. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 3:
                $ceo_text->meta_title       = 'Цены на услуги водоснабжения';
                $ceo_text->meta_description = 'Цены на услуги водоснабжения для загородного дома и дачи. Опытные мастера подберут оборудование и проведут водопровод в ваш дом. Окончательная смета – в день осмотра участка.';
                break;
            case 4:
                $ceo_text->meta_title       = 'Цены на комплектующие для септиков';
                $ceo_text->meta_description = 'Цены на комплектующие для септиков. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 5:
                $ceo_text->meta_title       = 'Цены на обслуживание септиков';
                $ceo_text->meta_description = 'Цены на обслуживание септиков. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 6:
                $ceo_text->meta_title       = 'Цены на септики Астра';
                $ceo_text->meta_description = 'Цены на септики Астра. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 7:
                $ceo_text->meta_title       = 'Цены на септики Топас';
                $ceo_text->meta_description = 'Цены на септики Топас. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 8:
                $ceo_text->meta_title       = 'Цены на септики Биодека';
                $ceo_text->meta_description = 'Цены на септики Биодека. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 9:
                $ceo_text->meta_title       = 'Цены на септики Евробион';
                $ceo_text->meta_description = 'Цены на септики Евробион. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 10:
                $ceo_text->meta_title       = 'Цены на септики Волгарь';
                $ceo_text->meta_description = 'Цены на септики Волгарь. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 11:
                $ceo_text->meta_title       = 'Цены на септики Genesis';
                $ceo_text->meta_description = 'Цены на септики Genesis. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 12:
                $ceo_text->meta_title       = 'Цены на септики BioDevice';
                $ceo_text->meta_description = 'Цены на септики BioDevice. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 13:
                $ceo_text->meta_title       = 'Цены на септики Евролос ПРО';
                $ceo_text->meta_description = 'Цены на септики Евролос ПРО. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 16:
                $ceo_text->meta_title       = 'Цены на септики Евролос БИО';
                $ceo_text->meta_description = 'Цены на септики Евролос БИО. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 17:
                $ceo_text->meta_title       = 'Цены на септики Kolo Vesi';
                $ceo_text->meta_description = 'Цены на септики Kolo Vesi. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 18:
                $ceo_text->meta_title       = 'Цены на септики Garda';
                $ceo_text->meta_description = 'Цены на септики Garda. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 20:
                $ceo_text->meta_title       = 'Цены на септики Далос';
                $ceo_text->meta_description = 'Цены на септики Далос. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            case 21:
                $ceo_text->meta_title       = 'Цены на погреба Тингард';
                $ceo_text->meta_description = 'Цены на погреба Тингард. Купить погреб с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей погребов для автономной канализации.';
                break;
            case 22:
                $ceo_text->meta_title       = 'Цены на погреба Kellari';
                $ceo_text->meta_description = 'Цены на погреба Kellari. Купить погреб с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей погребов для автономной канализации.';
                break;
            case 23:
                $ceo_text->meta_title       = 'Цены на погреба Топас';
                $ceo_text->meta_description = 'Цены на погреба Топас. Купить погреб с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей погребов для автономной канализации.';
                break;
            case 24:
                $ceo_text->meta_title       = 'Цены на погреба Kelder';
                $ceo_text->meta_description = 'Цены на погреба Kelder. Купить погреб с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей погребов для автономной канализации.';
                break;
            case 25:
                $ceo_text->meta_title       = 'Цены на дренажные насосы для септиков';
                $ceo_text->meta_description = 'Цены на дренажные насосы для септиков. Купить септик с доставкой, монтажом и последующим обслуживанием. Официальный дилер ведущих производителей септиков для автономной канализации.';
                break;
            default:
                $ceo_text->meta_title       = 'Цены eco-set';
                $ceo_text->meta_description = 'Цены eco-set. Официальный дилер ведущих производителей септиков для автономной канализации.';
        }
        return $ceo_text;
    }
    public function search(Request $request)
    {
        $products = Product::where('category', 1)->get();

        $price = array();

        $favorites_user = collect([]);
        $comparisons_user = collect([]);
        $category_type = collect([]);

        $stockToProducts = collect([]);
        $stock = collect([]);
        $prod = collect([]);

        foreach ($products as $product) {
            array_push($price, $product->price);
        }
        $price_min = !empty($price) ? min($price) : 0;
        $price_max = !empty($price) ? max($price) : 1000;

        $categories = Category::where('type', 1)
            ->orderBy('id', 'desc')
            ->get();

        $search = $request->search;

        if (!empty($search)) {
            $products = Product::where('title', 'LIKE', "%$search%")->paginate(12);
            $count_result = count($products) > 0;
            if ($count_result) {
                $user = Cookie::get('name');

                foreach ($products as $product) {
                    $comparison = Comparison::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

                    if ($comparison) {
                        $comparisons_user->push($product->id);
                    }

                    $sTP = StockToProducts::where('id_product', $product->id)->first();

                    if ($sTP) {
                        $st = Stocks::where('id', $sTP->id_stock)->first();

                        $stockToProducts->push($sTP);

                        $stock->push($st);
                    }

                    $modification = Modification::find($product->modification);

                    $category = Category::find($modification->category);

                    if ($category) {
                        $category_type->push(array(
                            'product' => $product->id,
                            'type' => $category->type
                        ));
                    }
                }

                foreach ($products as $product) {
                    $favorites = Favorites::where('user', '=', $user)->where('id_product', '=', $product->id)->first();

                    if ($favorites) {
                        $favorites_user->push($product->id);
                    }
                }

                $categories = Category::where('type', 1)
                    ->orderBy('id', 'desc')
                    ->get();

                $reply = true;

            } else {
                $reply = false;
            }
        } else {
            $reply = false;
        }

        return view('page.catalog.search', compact(
            'reply',
            'products',
            'favorites_user',
            'comparisons_user',
            'prod',
            'categories',
            'price_min',
            'price_max',
            'stockToProducts',
            'stock',
            'category_type'
        ));
    }

    public function download($filename)
    {
        $pathToFile = public_path() . "/pdf/" . $filename;
        return response()->download($pathToFile);
    }


    public function water()
    {
        $waters = Water::all();

        $ceo_text = CeoText::where('type', 'waters')->first();

        return view('page.catalog.catalog_water', compact('waters', 'ceo_text'));
    }

    public function water_page($url)
    {
        $water = Water::where('url', $url)->orwhere('id', $url)->first();

        if (!$water) {
            return view('404');
        }

        if ($water->url != null && $water->id == $url) {
            return redirect('water/' . $water->url);
        }

        return view('page.catalog.water', compact('water'));
    }
}
