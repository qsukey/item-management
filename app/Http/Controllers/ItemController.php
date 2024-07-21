<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'recommend' => 'nullable|integer|between:0,5',
                'category' => 'required|string|max:255',
                'about' => 'nullable|string|max:500',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // imageファイルにバイナリデータを直接入れて表示(base64)
            $imageData = null; //nullが許容されるファイル
            if ($request->hasFile('image')){ // もし送信データに'image'があったら
                $imageData = base64_encode(file_get_contents($request->file('image'))); //base64_encodeする構文を適応<-https://x.gd/KU0lB
            }

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'recommend' => $request->recommend,
                'category' => $request->category,
                'about' => $request->about,
                'image' => $imageData,
            ]);

            return redirect('/items')->with('success', "写真が無事登録されました");;
        }

        return view('item.add');
    }

    /**
     * 写真レコードの詳細表示
     */
    public function detail($id)
    {
        $item = Item::findOrFail($id);
        return view('item.detail', ['item' => $item]);
    }

    /**
     * 編集レコードの返信画面表示
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item.edit', ['item' => $item]);
    }

    /**
    * グッズレコードの編集
    *
    * @param Request $request
    * @return Response
    */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:100',
            'recommend' => 'nullable|integer|between:0,5',
            'category' => 'required|string|max:255',
            'about' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // IDに照合したデータを更新しSave
        $item = Item::findOrFail($id);
        $item->name = $request->input('name');
        $item->recommend = $request->input('recommend');
        $item->category = $request->input('category');
        $item->about = $request->input('about');

        // imageファイルにバイナリデータを直接入れて表示(base64)
        if ($request->hasFile('image')) {
            $item->image = base64_encode(file_get_contents($request->file('image')));
        }

        $item->save();

        return redirect('items/')->with('success', "写真ID{$id} {$item->name}のデータが無事更新されました");
    }

    /**
    * グッズレコードの削除
    *
    * @param Request $request
    * @return Response
    */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('items/')->with('success', "写真ID{$id} {$item->name}のデータが削除されました");
    }
}
