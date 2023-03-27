import { useEffect, useRef, useState } from 'react';
import ReactQuill from 'react-quill';
import 'react-quill/dist/quill.snow.css';

function DescriptionField(props) {
  const [description, setDescription] = useState(props?.description);
  const ref = useRef(null);

  useEffect(() => {
    if (ref.current) {
      ref.current.value = props?.description || '';
    }
  }, [props?.description]);

  const handleEditorChange = (editor) => {
    setDescription(editor);
    if (ref.current) {
      ref.current.value = editor;
    }
  }

  return (
    <>
      <ReactQuill
        placeholder="Опишите препарат"
        modules={{
          toolbar: [
            [{ header: [2, 3, 4, 5, 6] }],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link', 'image'],
            [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
          ],
        }}
        formats={[
          'header',
          'font',
          'size',
          'bold',
          'italic',
          'underline',
          'strike',
          'blockquote',
          'list',
          'bullet',
          'link',
          'image',
          'video',
          'code-block',
          'align'
        ]}
        value={description}
        onChange={handleEditorChange}
      />
      <textarea ref={ref} className="visually-hidden" name="description"></textarea>
    </>
  );
}

export default DescriptionField;
