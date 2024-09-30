<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Fournisseur;
use App\Models\Direction;
use App\Models\Convention;
use App\Models\TypeVoiture;
use App\Models\City;
use App\Models\Articles;
use App\Models\MouvementStock;
use App\Models\SortieStock;


class DashboardController extends Controller
{
    public function index()
    {
        $totalConventions = Convention::count();

        return view('dashboard.index', compact('totalConventions'));
    }
     //CONVENTIONS
     public function conventions()
    {
        $conventions = Convention::all();

        return view('conventions.index', compact('conventions'));
    }

    public function conventionsAdd()
    {
        return view('conventions.add');
    }

    public function conventionsStore(Request $request)
    {
        $request->validate([
            'numero' => 'required',
            'objet' => 'required',
            'exercice' => 'required',
            'nom' => 'required',
            'adresse' => 'required',
            'fiscale' => 'required',
            'statistiques' => 'required',
            'pdf' => 'required|mimes:pdf|max:10000' // Valider le fichier PDF
        ]);



        // Gérer l'upload du fichier PDF
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $path = $file->store('pdfs', 'public'); // Stocker dans storage/app/public/pdfs

            // Créer un nouvel enregistrement
            Convention::create([
                'numero' => $request->numero,
                'objet' => $request->objet,
                'exercice' => $request->exercice,
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'fiscale' => $request->fiscale,
                'statistiques' => $request->statistiques,
                'path' => $path, // Stocker le chemin du fichier PDF
            ]);
        }

        return redirect()->route('conventions.index')->with('success', 'Conventions créé avec succès');
    }

    public function conventionsEdit(Convention $convention)
    {
        return view('conventions.edit', compact('convention'));
    }

    public function conventionsUpdate(Request $request, $id)
    {
    // Valider les champs du formulaire
    $request->validate([
        'numero' => 'required',
        'objet' => 'required',
        'exercice' => 'required|integer',
        'nom' => 'required',
        'adresse' => 'required',
        'fiscale' => 'required',
        'statistiques' => 'required',
        'pdf' => 'nullable|mimes:pdf|max:10000' // PDF facultatif lors de la mise à jour
    ]);

    // Récupérer l'enregistrement existant
    $convention = Convention::findOrFail($id);

    // Gérer l'upload du nouveau fichier PDF
    if ($request->hasFile('pdf')) {
        // Supprimer l'ancien fichier si un nouveau fichier est uploadé
        if (\Storage::disk('public')->exists($convention->path)) {
            \Storage::disk('public')->delete($convention->path);
        }

        // Stocker le nouveau fichier PDF
        $file = $request->file('pdf');
        $path = $file->store('pdfs', 'public'); // Stocker dans 'storage/app/public/pdfs'
        $convention->path = $path; // Mettre à jour le chemin du fichier PDF
    }

    // Mettre à jour les autres champs
    $convention->update([
        'numero' => $request->numero,
        'objet' => $request->objet,
        'exercice' => $request->exercice,
        'nom' => $request->nom,
        'adresse' => $request->adresse,
        'fiscale' => $request->fiscale,
        'statistiques' => $request->statistiques,
    ]);

    return redirect()->route('conventions.index')->with('success', 'Convention mise à jour avec succès');
    }

    public function conventionsDestroy(Convention $convention)
    {
        $convention->delete();

        return redirect()->route('conventions.index')->with('success', 'Convention supprimée avec succès.');
    }

    public function conventionsShow(Convention $convention)
    {
    // Retourner la vue 'show' avec l'enregistrement spécifique

    return view('conventions.show', compact('convention'));
    }


     //CATEGORIES
    public function categories()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
    public function categoriesAdd()
    {
        return view('categories.add');
    }

    public function categoriesStore(Request $request)
    {
        $request->validate([
            'designation' => 'required|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function categoriesEdit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function categoriesUpdate(Request $request, Category $category)
    {
        $request->validate([
            'designation' => 'required|unique:categories,designation,'.$category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function categoriesDestroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }


    //FOURNISSEURS
    public function fournisseurs()
    {
        $fournisseurs = Fournisseur::all();

        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function fournisseursAdd()
    {
        return view('fournisseurs.add');
    }

    public function fournisseursStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fournisseurs',
        ]);

        Fournisseur::create($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseurs créée avec succès.');
    }

    public function fournisseursEdit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function fournisseursUpdate(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'name' => 'required|unique:fournisseurs,name,'.$fournisseur->id,
        ]);

        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseurs mise à jour avec succès.');
    }

    public function fournisseursDestroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseurs supprimée avec succès.');
    }

    //DIRECTIONS
    public function directions()
    {
        $directions = Direction::all();

        return view('directions.index', compact('directions'));
    }

    public function directionsAdd()
    {
        return view('directions.add');
    }

    public function directionsStore(Request $request)
    {
        $request->validate([
            'designations' => 'required|unique:directions',
        ]);

        Direction::create($request->all());

        return redirect()->route('directions.index')->with('success', 'Direction créée avec succès.');
    }

    public function directionsEdit(Direction $direction)
    {
        return view('directions.edit', compact('direction'));
    }

    public function directionsUpdate(Request $request, Direction $direction)
    {
        $request->validate([
            'designations' => 'required|unique:directions,designations,'.$direction->id,
        ]);

        $direction->update($request->all());

        return redirect()->route('directions.index')->with('success', 'Direction mise à jour avec succès.');
    }

    public function directionsDestroy(Direction $direction)
    {
        $direction->delete();

        return redirect()->route('directions.index')->with('success', 'Direction supprimée avec succès.');
    }

    //MATERIEL
    public function materiels()
    {
        return view('materiels.global.index');
    }


    //TYPEVOITURE
    public function typesvoitures()
    {
        $typesvoitures = TypeVoiture::all();

        return view('typesvoitures.index', compact('typesvoitures'));
    }

    public function typesvoituresAdd()
    {
        return view('typesvoitures.add');
    }
    
    public function typesvoituresStore(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:voiturestypes',
        ]);

        TypeVoiture::create($request->all());

        return redirect()->route('typesvoitures.index')->with('success', 'Type de voiture créée avec succès.');
    }

    public function typesvoituresEdit(TypeVoiture $typesvoitures)
    {
        return view('typesvoitures.edit', compact('typesvoitures'));
    }


    public function typesvoituresUpdate(Request $request, TypeVoiture $typesvoitures)
    {
        $request->validate([
            'type' => 'required|unique:voiturestypes,type,'.$typesvoitures->id,
        ]);

        $typesvoitures->update($request->all());

        return redirect()->route('typesvoitures.index')->with('success', 'Type du voiture mise à jour avec succès.');
    }

    public function typesvoituresDestroy(TypeVoiture $typesvoitures)
    {
        $typesvoitures->delete();

        return redirect()->route('typesvoitures.index')->with('success', 'Type de voiture supprimée avec succès.');
    }
    
    //CITIES
    public function cities()
    {
        $cities = City::all();
        
        return view('city.index', compact('cities'));
    }

    public function citiesAdd()
    {
        return view('city.add');
    }
    
    
    public function citiesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities',
            'cp' => 'required|unique:cities',
        ]);
        
        City::create($request->all());
        
        return redirect()->route('city.index')->with('success', 'Ville créée avec succès.');
    }
    
    public function citiesEdit(City $city)
    {
        return view('city.edit', compact('city'));
    }
    
    public function citiesUpdate(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,'.$city->id,
            'cp' => 'required|unique:cities,cp,'.$city->id,
        ]);
        
        $city->update($request->all());
        
        return redirect()->route('city.index')->with('success', 'Ville mise à jour avec succès.');
    }
    
    public function citiesDestroy(City $city)
    {
        $city->delete();
        
        return redirect()->route('city.index')->with('success', 'Ville supprimée avec succès.');
    }
    
    //ARTICLES
    
    public function articles()
    {
        $articles = Articles::all();
        
        return view('articles.index', compact('articles'));
    }
    
    public function articlesAdd()
    {
        return view('articles.add');
    }

    public function articlesStore(Request $request)
    {
        $request->validate([
            'design' => 'required|unique:articles',
        ]);
        
        Articles::create($request->all());
        
        return redirect()->route('articles.index')->with('success', 'Articles créée avec succès.');
    }
    
    public function articlesEdit(Articles $articles)
    {
        return view('articles.edit', compact('articles'));
    }
    
    public function articlesUpdate(Request $request, Articles $articles)
    {
        $request->validate([
            'design' => 'required|unique:articles,design,'.$articles->id,
        ]);
        
        $articles->update($request->all());
        
        return redirect()->route('articles.index')->with('success', 'Article mise à jour avec succès.');
    }

    public function articlesDestroy(Articles $articles)
    {
        $articles->delete();
        
        return redirect()->route('articles.index')->with('success', 'Article supprimée avec succès.');
    }

    //STOCK

    public function showEntrerForm()
    {
        // Récupérer tous les articles et toutes les directions
        $articles = Articles::all();
        $directions = Direction::all();

        // Récupérer tous les mouvements de stock (filtrer uniquement les entrées)
        $mouvements_stock = MouvementStock::with('article', 'direction')->where('type_mouvement', 'entrée')->get();

        // Retourner la vue avec les articles, directions et mouvements de stock
        return view('materiels.entrer.index', compact('articles', 'directions', 'mouvements_stock'));
    }

    public function entrer(Request $request)
    {
        // Validation des données d'entrée
        $validatedData = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'quantité' => 'required|integer|min:1',
            'direction_id' => 'required|exists:directions,id',
        ]);

        // Enregistrement du mouvement d'entrée
        MouvementStock::create([
            'article_id' => $request->article_id,
            'type_mouvement' => 'entrée',
            'quantité' => $request->quantité,
            'direction_id' => $request->direction_id,
            'date_mouvement' => now(),
        ]);

        // Mise à jour de la quantité de l'article dans le stock
        $article = Article::find($request->article_id);
        $article->quantité_stock += $request->quantité;
        $article->save();

        return redirect()->back()->with('success', 'Entrée enregistrée avec succès');
    }

    // Méthode pour enregistrer une sortie de stock
    public function sortir(Request $request)
    {
        // Validation des données de sortie
        $validatedData = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'quantité' => 'required|integer|min:1',
            'ville_destination' => 'nullable|string',
            'direction_id' => 'nullable|exists:directions,id',
        ]);

        // Vérification de la disponibilité du stock
        $article = Article::find($request->article_id);
        if ($article->quantité_stock < $request->quantité) {
            return redirect()->back()->with('error', 'Quantité insuffisante en stock pour cette sortie.');
        }

        // Enregistrement du mouvement de sortie
        MouvementStock::create([
            'article_id' => $request->article_id,
            'type_mouvement' => 'sortie',
            'quantité' => $request->quantité,
            'ville_destination' => $request->ville_destination,
            'direction_id' => $request->direction_id,
            'date_mouvement' => now(),
        ]);

        // Mise à jour de la quantité de l'article dans le stock
        $article->quantité_stock -= $request->quantité;
        $article->save();

        // Enregistrement de la sortie dans la table SortieStock
        SortieStock::create([
            'article_id' => $request->article_id,
            'quantité_sortie' => $request->quantité,
            'ville_destination' => $request->ville_destination,
            'direction_id' => $request->direction_id,
            'date_sortie' => now(),
            'quantité_restante' => $article->quantité_stock,
        ]);

        return redirect()->back()->with('success', 'Sortie enregistrée avec succès');
    }
}
