import { Box, List, ListItemButton, ListItemIcon, ListItemText } from '@mui/material';
import HomeIcon from '@mui/icons-material/Home';
import MedicationIcon from '@mui/icons-material/Medication';
import CategoryIcon from '@mui/icons-material/Category';
import TagIcon from '@mui/icons-material/Tag';
import { AdminRoute } from '../../../const';

function PageNavigation() {
  return (
    <Box sx={{
      borderRight: '1px solid rgba(0, 0, 0, 0.12)',
      backgroundColor: 'white',
    }}>
      <List component="nav">
        <ListItemButton href={AdminRoute.HOME}>
          <ListItemIcon>
            <HomeIcon />
          </ListItemIcon>
          <ListItemText primary="Вернуться на сайт" />
        </ListItemButton>

        <ListItemButton href={AdminRoute.PRODUCTS}>
          <ListItemIcon>
            <MedicationIcon />
          </ListItemIcon>
          <ListItemText primary="Препараты" />
        </ListItemButton>

        <ListItemButton href={AdminRoute.CATEGORIES}>
          <ListItemIcon>
            <CategoryIcon />
          </ListItemIcon>
          <ListItemText primary="Направлении" />
        </ListItemButton>

        <ListItemButton href={AdminRoute.TAGS}>
          <ListItemIcon>
            <TagIcon />
          </ListItemIcon>
          <ListItemText primary="Теги" />
        </ListItemButton>
      </List>
    </Box>
  );
}

export default PageNavigation;
