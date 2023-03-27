import { Box, Button, Grid, InputLabel, TextField } from '@mui/material';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import { AdminRoute, APIRoute } from '../../../const';
import BodyField from './BodyField/BodyField';
import CategoriesField from './CategoriesField/CategoriesField';
import DescriptionField from './DescriptionField/DescriptionField';
import FileField from './FileField/FileField';
import ImageField from './ImageField/ImageField';
import PrescriptionsField from './PrescriptionsField/PrescriptionsField';
import TagsField from './TagsField/TagsField';

function ProductForm({ product }) {
  const navigate = useNavigate();

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    if (product) {
      axios.post(APIRoute.PRODUCTS_UPDATE, new FormData(evt.target))
        .then(({ data }) => {
          toast.success(data.message);
        })
        .catch((error) => console.log(error));

      return;
    }

    axios.post(APIRoute.PRODUCTS_STORE, new FormData(evt.target))
      .then(({ data }) => {
        toast.success(data.message);
        navigate(AdminRoute.PRODUCTS);
      })
      .catch((error) => console.log(error));
  };

  return (
    <Box
      component="form"
      sx={{
        display: 'flex',
        flexDirection: 'column',
        gap: 2,
        padding: "32px 24px",
        backgroundColor: 'white',
        borderRadius: 1,
        marginTop: 2,
      }}
      onSubmit={handleFormSubmit}
      encType='multipart/form-data'
    >
      {product?.id && <input name="id" type="hidden" defaultValue={product.id} />}
      <Grid container spacing={2}>
        <Grid item xs={3}>
          <ImageField image={product?.image} />
        </Grid>

        <Grid item xs={5} display="flex" flexDirection="column" gap={2} justifyContent="flex-end">
          <TextField
            fullWidth
            name="title"
            label="Название препарата"
            defaultValue={product?.title}
            type="text"
            required
          />
          <CategoriesField category={product?.category_id} />
          <TagsField selectedTags={product?.tags} />
        </Grid>

        <Grid item xs={4} display="flex" flexDirection="column" gap={2} justifyContent="flex-end">
          <FileField file={product?.file} />
          <TextField
            fullWidth
            name="url"
            type="url"
            label="Ссылка"
            defaultValue={product?.url}
          />
          <PrescriptionsField prescription={product?.prescription_id} />
        </Grid>
      </Grid>

      <Grid item xs={12}>
        <InputLabel>Описание</InputLabel>
        <DescriptionField description={product?.description} />
      </Grid>

      <Grid item xs={12}>
        <InputLabel>Состав, Показания к применению, Способ применения</InputLabel>
        <BodyField body={product?.body} />
      </Grid>

      <Grid item xs={12} display="flex" justifyContent="flex-end">
        <Button variant="contained" color="success" size="large" type="submit">Сохранить</Button>
      </Grid>
    </Box>
  );
}

export default ProductForm;
