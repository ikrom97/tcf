import { Box, List, ListItemButton, ListItemIcon, ListItemText } from '@mui/material';
import HomeIcon from '@mui/icons-material/Home';
import TourIcon from '@mui/icons-material/Tour';
import NewspaperIcon from '@mui/icons-material/Newspaper';
import ArticleIcon from '@mui/icons-material/Article';
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

        <ListItemButton href={AdminRoute.TOURNAMENTS}>
          <ListItemIcon>
            <TourIcon />
          </ListItemIcon>
          <ListItemText primary="Турниры" />
        </ListItemButton>

        <ListItemButton href={AdminRoute.NEWS}>
          <ListItemIcon>
            <NewspaperIcon />
          </ListItemIcon>
          <ListItemText primary="Новости" />
        </ListItemButton>

        <ListItemButton href={AdminRoute.ARTICLES}>
          <ListItemIcon>
            <ArticleIcon />
          </ListItemIcon>
          <ListItemText primary="Статьи" />
        </ListItemButton>
      </List>
    </Box>
  );
}

export default PageNavigation;
