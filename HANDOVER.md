# HANDOVER(引継ぎ・進捗メモ)

最終更新日: 2026-07-07

> このファイルは作業するたびに更新してください。
> 設計思想そのものは README.md を参照。

---

## 現在の進捗

### 生徒管理(modules/students) — 完成済み

- index.php / list.php / create.php / edit.php 作成済み
- DB: hr_manager.students
  - id, name, furigana, gender, birth_date, phone, email, address, job, japanese_level, location, remarks, created_at
- CRUD: 一覧○ 新規登録○ 編集○ 削除○

### マスター管理(modules/master) — 作成中

- 済み master フォルダ作成済み
- 済み education フォルダ作成済み
- 済み modules/master/index.php 作成済み
- 未 modules/master/education/index.php ← 次の作業

---

## 次にやること(直近タスク)

1. modules/master/education/index.php を作成
   - 「教育」→「学校」「担当者」「クラス」への入口メニュー
2. 学校マスターのCRUD一式(画面→一覧→登録→保存→編集→削除)
3. 担当者マスター
4. クラスマスター
5. 教育管理画面と接続(学校→クラス→担当者→業務)

---

## 検討中・未決定事項

- マスターテーブルの項目(school_name以外に何を持たせるか)
- teacher-class の紐付け方(1対多か多対多か)
- 業務テーブルへの入力担当者記録方法
- 卒業履歴・他システム連携方式
- 名刺OCR利用時の個人情報の扱い
