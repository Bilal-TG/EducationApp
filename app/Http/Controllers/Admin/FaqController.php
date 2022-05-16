<?php

namespace App\Http\Controllers\Admin;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class FaqController extends Controller
{
    public function index()
    {
        $allFaqs = FAQ::all();
        return view('all-faq', compact('allFaqs'));
    }

    public function add()
    {
        return view('add-faqs');
    }

    public function saveFaq(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faq_question' => 'required|string',
            'faq_answer' => 'required|string',
        ]);
        
        if ($validator->fails())
        {
            Session()->flash('error', 'All fields are required!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back()->withInput();
        }
$checkQuestion = FAQ::whereQuestion($request->faq_question)->first();
        if($checkQuestion)
        {
            Session()->flash('error', 'Question already exists! Please try another one.');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back()->withInput();
        }
        
            $data = $request->all();
            $data['question'] = $request->faq_question;
            $data['answer'] = $request->faq_answer;
            $save = FAQ::create($data);
            if ($save) 
            {
                Session()->flash('message', 'Subject created successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->route('allFaq');
            }
    }
    public function editfaq($id)
    {
        $faq = FAQ::find($id);
        return view('edit-faq', compact('faq'));
    }

    public function updateFaq(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'faq_question' => 'required|string',
            'faq_answer' => 'required|string',
        ]);
        
        if ($validator->fails())
        {
            Session()->flash('error', 'All fields are required!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back()->withInput();
        }

        
        $faq = FAQ::whereId($id)->first();
        $faq->question = $request->faq_question;
        $faq->answer = $request->faq_answer;
        $save = $faq->save();
            if ($save) 
            {
                Session()->flash('success', 'FAQ Updated successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->route('allFaq');
            }
    }

    public function deleteFaq(Request $request)
    {
        $faq = FAQ::whereId($request->id)->first();
        if ($faq) {
            $faq->delete();
            session()->flash('success', 'FAQ Deleted Successfully!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-cross-circle-fill');
            return redirect()->route('allFaq');
        } else {
            session()->flash('success', 'Something went wrong');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->route('allFaq');
        }
    }
}