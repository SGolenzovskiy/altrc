<?php
/**
 * Controller for work with project
 *
 * @author Sintsov Roman <romiras_spb@mail.ru>
 * @copyright Copyright (c) 2016, Altrc
 */
namespace App\Http\Controllers;

use App\CountryProject;
use App\ReferenceProject;
use App\ServiceProject;
use App\SectorProject;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Project;
use App\Helpers\Helper;

class ProjectController extends Controller
{

    /**
     * Index page
     */
    public function index()
    {
        return view('index', [
            'services' => ServiceProject::dictionary(),
            'sectors' => SectorProject::dictionary(),
            'country' => CountryProject::dictionary()
        ]);
    }

    /**
     * Create new project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('project.create', [
            'services' => ServiceProject::dictionary(),
            'sectors' => SectorProject::dictionary(),
            'country' => CountryProject::dictionary()
        ]);
    }

    /**
     * Save project
     * @param  Request $request request
     * @return Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:projects',
            'logo' => 'image',
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->year = $request->year . "-01-01";
        $imgName = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move('images/logos', $imgName);
        $project->logo = '/logos/' . $imgName;
        $project->save();

        $idProject = $project->id;

        $dictionaries = [
            'services' => '\App\ServiceProject',
            'sectors' => '\App\SectorProject',
            'country' => '\App\CountryProject'
        ];

        foreach ($dictionaries as $key => $value) {
            if ($request->$key) {
                $dictionary = new $value();
                $arr = $request->$key;
                $this->saveDictionary($dictionary, $arr, $idProject);
            }
        }

        var_dump($request);
        die;
    }

    private function saveDictionary($dictionary, $arr, $idProject)
    {
        $data = array();
        foreach ($arr as $value) {
            $data[] = array('name' => $value, 'project_id' => $idProject);
        }
        $dictionary->insert($data);
    }

    /**
     * @param Request $request request
     * @return Response
     */
    public function filter(Request $request)
    {
        if (!$request->isMethod('post')) {
            return Helper::jsonError('Произошла ошибка');
        }
        $model = new Project();
        $projects = $model->getByFilter($request);
        return response()->json([
            'status' => 'success',
            'result' => view('filter.result', ['projects' => $projects])->render(),
            'amount' => $projects->total()
        ]);
    }
}